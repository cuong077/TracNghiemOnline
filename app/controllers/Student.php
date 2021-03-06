<?php

class Student extends Controller{
  
    public function __construct() {

        if(!$this->is_Login()){
            $this->redirect("Home");
            exit;
        }
        if(!$this->is_Student()){
            $this->redirect("Home");
            exit;
        }
    }
    


    //Exam

    public function joinExam($exam_id){

        // Khi join vào bài thi hệ thống sẽ kiểm tra người này đã làm bài thi này lần nào chưa?
        // Nếu chưa thì tạo mới và chuyển sang trang làm bài thi
        // Nếu có rồi thì kiểm tra là bài thi này đã làm xong chưa?
        // Nếu đã làm xong thì tạo bài thi mới và chuyển sang làm bài thi
        // Nếu chưa làm xong thì chuyển sang trang làm bài tiếp tục

        $userid = $this->getUserId();
        $exam_id = $this->clear($exam_id);

        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $userAnswerModel = $this->model("UserAnswerModel");

        $questionModel = $this->model("QuestionModel");

        $answerModel = $this->model("AnswerModel");
            

        $exam = mysqli_fetch_array($examModel->getExam($exam_id));

        if((int)$exam["ExamTypeId"] != 1){
            echo "<script>alert('Không phải là bài thi');</script>";
            $this->redirect("Student");
            exit;
        }


        $is_joined = false;
        $is_completed = false;


        $examresult_result = $examResultModel->getExamResultWithID($exam_id, $userid);


        if(mysqli_num_rows($examresult_result) > 0){
            $result_fetch = mysqli_fetch_array($examresult_result);

            $is_joined = true;
            $is_completed = (bool)$result_fetch["Is_completed"];
            $examResultID = $result_fetch["ResultId"];
        }
      
      
        if($is_joined != true){

        //chưa tham gia thì cho tham gia mới từ đầu
        $date = date('Y-m-d H:i:s');
        $newExamResultID = $examResultModel->addExamResult($date, $userid, $exam_id, 0);

            //add câu trả lời rỗng cho user
            $ArrQuestions = $this->getAllQuestionOfExam($questionModel, $answerModel, $exam_id);

            foreach ($ArrQuestions as $question){
                $userAnswerModel->addUserAnswer($newExamResultID, $question->id, "NULL");
            }


            $this->redirect("Student/doExam/" . $newExamResultID);

            exit;

        }else if($is_joined == true && $is_completed != true){

        //đã tham gia nhưng chưa làm xong thì cho làm tiếp

            $this->redirect("Student/doExam/" . $examResultID);
            exit;

        }else{

        //đã tham gia và đã làm xong thì cho đi xem kết quả :)))
            $this->redirect("Student/viewExamResult/" . $examResultID);
            exit;
        }
    }

    public function doExam($result_id){

        // Trang làm bài thi tiếp nhận exam_id_result
        // Nó sẽ kiểm tra trước tiên trang thái đã hoàn thành hay chưa?
        // Nếu đã completed thì chuyển sang trang xem kết quả
        // Nếu chưa complete thì kiểm tra xem còn thời gian làm bài thi hay không?
        // Nếu đã hết thời gian thì submit bài thi luôn và chuyển sang trang viewResultExam
        // Còn chưa thì cho làm tiếp tục
            

        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");




        $result_id = $this->clear($result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($result_id));

        $is_completed = (bool)$exam_result["Is_completed"];

        if($is_completed){
            $this->redirect("Student/viewResultExam/" . $result_id);
            exit;
        }


        $time_join_parsed = strtotime($exam_result["TimeJoin"]);

        $time_current_parsed = strtotime(date('Y-m-d H:i:s'));

        $timePassed = (int)($time_current_parsed - $time_join_parsed);




        $exam = mysqli_fetch_array($examModel->getExam($exam_result["ExamId"]));

        $timeWork = ((int)$exam["Time"]) * 60;

        if(($timeWork - $timePassed) <= 0){

        //lúc này là hết thời gian
            $this->redirect("Student/submitExam/" . $result_id);
            exit;

        }

        //còn thời gian thì cho làm tiếp ở đây

        
        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_result["ExamId"], $result_id, $this->getUserId());



        $this->view("simple2", [
            "Page"                  => "simple2_joining_exam",
            "title"                 => "Đang thi....",
            "all_question"          => $ArrQuestions,
            "exam_name"         => $exam["Name"],
            "time_left"             => $timeWork - $timePassed,
            "result_id"           => $result_id
        ]);
    }

    public function submitExam($result_id){

        //Nộp bài

        $result_id = $this->clear($result_id);

        //load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($result_id));

        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_result["ExamId"], $result_id, $this->getUserId());

        $total_answer_right = 0;
        $total_answer_wrong = 0;
        $total_question_not_answer = 0;
        $total_question = count($ArrQuestions);

        foreach ($ArrQuestions as $questions) {
            
            if($questions->Is_have_answer_choosed == false){
                $total_question_not_answer++;
                continue;
            }

            $flag = false;

            for($i = 0; $i <= 3; $i++){
                if($questions->listAnswerOfQuestion[$i]->is_Correct == true && $questions->listAnswerOfQuestion[$i]->is_UserChoose){
                    $total_answer_right++;
                    $flag = true;
                    break;
                }
            }

            if($flag == false)
                $total_answer_wrong++;
        }

        $examResultModel->updateStatusExamResult($result_id, 1);

        $examResultModel->updateScoreExamResult($result_id, round($total_answer_right * (10 / $total_question), 2));

        $this->redirect("Student/viewExamResult/".$result_id);
        exit;
    }



    //Exercise

    public function joinExercise($exam_id){

        // Khi join vào bài thi hệ thống sẽ kiểm tra người này đã làm bài thi này lần nào chưa?
        // Nếu chưa thì tạo mới và chuyển sang trang làm bài thi
        // Nếu có rồi thì kiểm tra là bài thi này đã làm xong chưa?
        // Nếu đã làm xong thì tạo bài thi mới và chuyển sang làm bài thi
        // Nếu chưa làm xong thì chuyển sang trang làm bài tiếp tục

        $userid = $this->getUserId();
        $exam_id = $this->clear($exam_id);


        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $userAnswerModel = $this->model("UserAnswerModel");

        $questionModel = $this->model("QuestionModel");

        $answerModel = $this->model("AnswerModel");
            
        $exam = mysqli_fetch_array($examModel->getExam($exam_id));

        if((int)$exam["ExamTypeId"] != 2){
            echo "<script>alert('Không phải là bài tập về nhà');</script>";
            $this->redirect("Student");
            exit;
        }

        $is_newResult = false;

        $examResultID = $examResultModel->checkExistExamResultOfUser($userid, $exam_id);


        if($examResultID == null){
            $is_newResult = true;
        }else{

            $is_completed = $examResultModel->checkExamResultIsCompleted($examResultID);

            if($is_completed)
                $is_newResult = true;
        }


        if($is_newResult){

            //tạo kết quả mới
            $date = date('Y-m-d H:i:s');
            $newExamResultID = $examResultModel->addExamResult($date, $userid, $exam_id, 0);

            //add câu trả lời rỗng cho user
            $ArrQuestions = $this->getAllQuestionOfExam($questionModel, $answerModel, $exam_id);

            foreach ($ArrQuestions as $question){
                $userAnswerModel->addUserAnswer($newExamResultID, $question->id, "NULL");
            }


            $this->redirect("Student/doExercise/" . $newExamResultID);

            exit;

        }else{

            $this->redirect("Student/doExercise/" . $examResultID);
            exit;
        }  
    }

    public function doExercise($result_id){

        // Trang làm bài thi tiếp nhận exam_id_result
        // Nó sẽ kiểm tra trước tiên trang thái đã hoàn thành hay chưa?
        // Nếu đã completed thì chuyển sang trang xem kết quả
        // Nếu chưa complete thì kiểm tra xem còn thời gian làm bài thi hay không?
        // Nếu đã hết thời gian thì submit bài thi luôn và chuyển sang trang viewResultExam
        // Còn chưa thì cho làm tiếp tục
            

        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");




        $result_id = $this->clear($result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($result_id));

        $is_completed = (bool)$exam_result["Is_completed"];

        if($is_completed){
            $this->redirect("Student/viewResultExam/" . $result_id);
            exit;
        }


        $time_join_parsed = strtotime($exam_result["TimeJoin"]);

        $time_current_parsed = strtotime(date('Y-m-d H:i:s'));

        $timePassed = (int)($time_current_parsed - $time_join_parsed);




        $exam = mysqli_fetch_array($examModel->getExam($exam_result["ExamId"]));

        $timeWork = ((int)$exam["Time"]) * 60;

        if(($timeWork - $timePassed) <= 0){

        //lúc này là hết thời gian
            $this->redirect("Student/submitExam/" . $result_id);
            exit;

        }

        //còn thời gian thì cho làm tiếp ở đây

        
        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_result["ExamId"], $result_id, $this->getUserId());



        $this->view("simple2", [
            "Page"                  => "simple2_joining_exercise",
            "title"                 => "Đang làm bài tập về nhà....",
            "all_question"          => $ArrQuestions,
            "exam_name"         => $exam["Name"],
            "time_left"             => $timeWork - $timePassed,
            "result_id"           => $result_id
        ]);
    }



    //Result

    public function viewExamResult($result_id){

        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");


        $result_id = $this->clear($result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($result_id));

        $exam = mysqli_fetch_array($examModel->getExam($exam_result["ExamId"]));

        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_result["ExamId"], $result_id, $this->getUserId());

        $total_answer_right = 0;
        $total_answer_wrong = 0;
        $total_question_not_answer = 0;
        $total_question = count($ArrQuestions);

        foreach ($ArrQuestions as $questions) {
            
            if($questions->Is_have_answer_choosed == false){
                $total_question_not_answer++;
                continue;
            }

            $flag = false;

            for($i = 0; $i <= 3; $i++){
                if($questions->listAnswerOfQuestion[$i]->is_Correct == true && $questions->listAnswerOfQuestion[$i]->is_UserChoose){
                    $total_answer_right++;
                    $flag = true;
                    break;
                }
            }

            if($flag == false)
                $total_answer_wrong++;
        }


        $this->view("simple2", [
            "Page"                  => "simple2_student_view_result_exam",
            "title"                 => "Xem kết quả",
            "result_id"             => $result_id,
            "total_answer_right"    => $total_answer_right,
            "total_answer_wrong"    => $total_answer_wrong,
            "total_question_not_answer" =>  $total_question_not_answer,
            "total_question"        => $total_question,
            "exam_name"             => $exam["Name"],
            "exam_description"      => $exam["Description"],
            "exam_time"             => $exam["TimeName"],
            "exam_amount_of_question"   => $exam["AmountOfQuestion"]
        ]);
    }

    public function viewExamResultAnswer($result_id){
        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");



        $result_id = $this->clear($result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($result_id));

        $exam = mysqli_fetch_array($examModel->getExam($exam_result["ExamId"]));

        $is_completed = (bool)$exam_result["Is_completed"];



        $time_join_parsed = strtotime($exam_result["TimeJoin"]);

        $time_current_parsed = strtotime(date('Y-m-d H:i:s'));

        $timePassed = (int)($time_current_parsed - $time_join_parsed);



        $exam = mysqli_fetch_array($examModel->getExam($exam_result["ExamId"]));

        $timeWork = ((int)$exam["Time"]) * 60;

        if(($timeWork - $timePassed) <= 0){
        //lúc này là hết thời gian

            if($is_completed == false){
                $this->redirect("Student/submitExam/" . $result_id);
                exit;
            }
        
        }else if(($timeWork - $timePassed) > 0 && $is_completed == false){
            $this->redirect("Student/doExam/" . $result_id);
            exit;
        }

        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_result["ExamId"], $result_id, $this->getUserId());


        $this->view("simple2", [
            "Page"                  => "simple2_student_view_result_answer",
            "title"                 => "Xem đáp án",
            "all_question"          => $ArrQuestions,
            "exam_name"         => $exam["Name"],
            "result_id"           => $result_id,
            "exam_time"             => $exam["TimeName"],
            "total_question"        => count($ArrQuestions),
            "exam_description"      => $exam["Description"]
        ]);
    }

    public function viewListExamJoined(){

        //load model

        $exam_result_model = $this->model("ExamResultsModel");



        $user_id = $this->getUserId();


        $exam_result_with_userid = $exam_result_model->getResultWithUserId($user_id);

        $list_result = [];

        while ($row = mysqli_fetch_array($exam_result_with_userid)){
            $result = new Result();

            $result->exam_name = $row["exam_name"];
            $result->class_name = $row["class_name"];
            $result->time_join = $row["time_join"];
            $result->time_name = $row["time_name"];
            $result->score = $row["score"];
            $result->result_id = $row["result_id"];
            $result->is_completed = $row["is_completed"];
            $result->type_name = $row["exam_type_name"];

            $list_result[] = $result;

        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_view_list_exam_joined",
            "title"                          => "Lịch sử thi",
            "menu"                          => "simple2_student_menu",
            "list_result"                   => $list_result
        ]);
    }



    public function ListClasses(){

        $classModel = $this->model("ClassModel");
        $userId = $this->getUserId();
        $classResult = $classModel->getListClassesForStudent($userId);
        $classes = [];
        // var_dump($classResult);

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getListGrades();
        $grades = [];
        $userClassModel = $this->model("UserClassModel");
        $total = 0;
        
        while ($row = mysqli_fetch_assoc($classResult)) {
            // var_dump($classResult);

            $classId = (int)$row["ClassId"];
            $joinClass = $userClassModel->checkUserJoinClass($userId, $classId);
            $total = $userClassModel->getTotalUserJoinedClass($classId);
            $row["total"] = $total;

            if($joinClass == true){
                $row["joined"] = "true";
            }
            else{
                $row["joined"] = "false";
            }

            array_push($classes, $row);
        }

        while ($row = mysqli_fetch_assoc($gradeResult)) {
         array_push($grades, $row);
        }

            $this->view("simple2", [
                "Page"                           => "simple2_student_listclasses",
                "title"                          => "Danh sách lớp học",
                "classes"                      => $classes,
                "grades"                       => $grades,
                "menu"                       => "simple2_student_menu",
                "totalUserJoinedClass"           => $total 
            ]);
    }

    public function JoinClass($classId){
        $error = [];
        $classModel = $this->model("ClassModel");
        $classResult = $classModel->getClassById($classId);
        $class = mysqli_fetch_assoc($classResult);
        $classId = $class["ClassId"];
        $teacherId = $class["UserId"];
        $password = $class["Password"];

        $userClassModel = $this->model("UserClassModel");
        $userId = $this->getUserId();
        $isRequested = $userClassModel->isRequestJoinClass($userId, $classId);
        $isShowRequestForm = "true";
        
        if($isRequested == true){
            $isShowRequestForm = "false";
        }

        // $isShowRequestForm = "false";

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getGradeNameWithClassId($classId);
        $grade = mysqli_fetch_assoc($gradeResult);
        $gradeName = $grade["Name"];
        
        $userModel = $this->model("UserModel");
        $userResult = $userModel->getUser((int)$teacherId);
        $user = mysqli_fetch_assoc($userResult);
        $teacherName = $user["FullName"];

        if(isset($_POST["joinClass"])){
            // insert info about join class for user.
            $passwordInput = $_POST["PasswordJoinClass"];
            if(strtolower($passwordInput) != strtolower($password)){
                $error["password"] = "Mật khẩu nhập không chính xác.";
            }

            if($error == []){
                $userClassResult = $userClassModel->insertUserClass($userId, $classId);
                // $this->redirect("Student/JoinClass/" + $classId);
                $isShowRequestForm = "false";
            }
        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_joinClass",
            "title"                          => "Join class",
            "menu"                       => "simple2_student_menu",
            "class"                      => $class,
            "error"                      => $error,
            "grade"                      => $gradeName,
            "teacher"                        => $teacherName,
            "isShowRequestForm"              => $isShowRequestForm
        ]);
    }

    public function JoinClassWithId(){

        $isShowRequestForm = true;
        $error = [];
        $userModel = $this->model("UserModel");
        $classModel = $this->model("ClassModel");
        $userClassModel = $this->model("UserClassModel");

        if(isset($_POST["joinClass"])){
            $classId = $_POST["classId"];
            if(!isset($classId)){
                $error["classId"] = "Vui lòng nhập id lớp học.";
            }
            else{
                try {
                    $classId = (int)$classId;
                    // echo $classId;
                    $userId = $this->getUserId();
                    $userResult = $userModel->getUser($userId);
                    $user = mysqli_fetch_assoc($userResult);
                    $gradeId = $user["GradeId"];
                    // var_dump($user);
                    $classResult = $classModel->getClassById($classId);
                    if(mysqli_num_rows($classResult) <= 0){
                        $error["classId"] = "ID lớp học không tồn tại.";
                    }
                    else{
                        $class = mysqli_fetch_assoc($classResult);
                        $password = $class["Password"];

                        $isCorrectGrade = $classModel->isCorrectGrade($classId,$gradeId);
                    
                        if($isCorrectGrade == false){
                            $error["classId"] = "Vui lòng chọn lớp đúng khối.";
                        }else{
                            $isRequested = $userClassModel->isRequestJoinClass($userId, $classId);
                            $isShowRequestForm = "true";
                            
                            if($isRequested == true){
                                $isShowRequestForm = "false";
                            }else{
                                $passwordInput = $_POST["PasswordJoinClass"];
                                
                                if(strtolower($passwordInput) != strtolower($password)){
                                    $error["password"] = "Mật khẩu nhập không chính xác.";
                                }
                            }
                        }
                    }
                    
                } catch (Exception $e) {
                    $error["classId"] = "Nhập số cho id lớp học.";
                }
            }

            if($error == [] && $isShowRequestForm == "true"){
                $userClassResult = $userClassModel->insertUserClass($userId, $classId);
            }
        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_joinWithId",
            "title"                          => "Join class with id",
            "menu"                           => "simple2_student_menu",
            "error"                          => $error,
            "isShowRequestForm"              => $isShowRequestForm
        ]);
    }
    

    public function test(){

      $this->view("simple2", [
        "Page"        => "simple2_joining_exam",
        "title"       => "Tạo đề thi"
      ]);

    }


    //API

    public function userAnswerQuestion(){

        if(isset($_POST["answer_id"])){

            $result_id = $this->clear($_POST["result_id"]);
            $question_id = $this->clear($_POST["question_id"]);
            $answer_id = $this->clear($_POST["answer_id"]);

            $user_answer_model = $this->model("UserAnswerModel");
            $user_answer_model->updateAnswer($result_id, $question_id, $answer_id);
        }
    }

    public function JoinClasses(){
        $classModel = $this->model("ClassModel");
        $userClassModel = $this->model("UserClassModel");
        $gradeModel = $this->model("GradeModel");
        $userModel = $this->model("UserModel");

        $studentId = $this->getUserId();
        $userClassResult = $userClassModel->getListClassJoinedForStudent($studentId);
        $classes = [];

        while ($row = mysqli_fetch_assoc($userClassResult)) {
            $rowToAdd = [];

            $classId = $row["ClassId"];
            $classResult = $classModel->getClassById($classId);
            $class = mysqli_fetch_assoc($classResult);
            
            array_push($rowToAdd, $classId);
            array_push($rowToAdd, $class["Name"]);
            array_push($rowToAdd, $class["Description"]);

            $gradeId = $class["GradeId"];
            $gradeResult = $gradeModel->getGrade($gradeId);
            $grade = mysqli_fetch_assoc($gradeResult);

            array_push($rowToAdd, $grade["Name"]);

            $teacherId = $class["UserId"];
            $teacherResult = $userModel->getUser($teacherId);
            $teacher = mysqli_fetch_assoc($teacherResult);

            $total = $userClassModel->getTotalUserJoinedClass($classId);

            array_push($rowToAdd, $teacher["FullName"]);
            array_push($rowToAdd, $total);

            // print_r($rowToAdd);
            $classes["ClassId_". $classId] = $rowToAdd;
        }
        // print_r($classes);

        $this->view("simple2", [
            "Page"                           => "simple2_student_joinClasses",
            "title"                          => "Danh sách lớp học",
            "classes"                        => $classes,
            "menu"                           => "simple2_student_menu",
            "totalUserJoinedClass"           => $total 
        ]);       
    }

    public function ListResourceClass($classId){
        $errors = [];
        
        $userClassModel = $this->model("UserClassModel");
        $examResultModel = $this->model("ExamResultsModel");

        $studentId = $this->getUserId();

        $joinClass = $userClassModel->checkUserJoinClass($studentId, $classId);
        $examinations = [];
        $execires = [];

        if($joinClass == false){
            $errors["joined"] = "Học sinh chưa tham gia lớp học.";
        }
        else{
            $examModel = $this->model("ExamsModel");
            $examResult = $examModel->getListExamsByClassIdWith($classId);
            // print_r($examResult);
            $index = 0;
            
            while($exam = mysqli_fetch_assoc($examResult)){
                $index++;
                $rowToAdd = [];
                $examId = $exam["ExamId"];
                
                array_push($rowToAdd, $examId);
                array_push($rowToAdd, $exam["Name"]);
                array_push($rowToAdd, $exam["Description"]);
                $cretedDate = new DateTime($exam["CreatedDate"]);
                $createdDateFormated = $cretedDate->format("m-d-Y");
                array_push($rowToAdd, $createdDateFormated);

                $isJoined = false;
                $isCompleted = false;

                $examresultResult = $examResultModel->getExamResultWithID($examId, $studentId);
          
                if(mysqli_num_rows($examresultResult) > 0){
                //kiem tra is_completed
                  $result_fetch = mysqli_fetch_array($examresultResult);
          
                  $isJoined = true;
                  $isCompleted = (bool)$result_fetch["Is_completed"];
                  
                  $examResultID = $result_fetch["ResultId"];
                  $rowToAdd["ResultId"] = $examResultID;
                  $rowToAdd["isJoined"] = $isJoined;
                  $rowToAdd["isCompleted"] = $isCompleted;
                }
                
                $examinations["ClassId_" . $index] = $rowToAdd;
            }

            $execriResult = $examModel->getListExamsByClassIdWithExamType($classId);
            $index = 0;
            while($exam = mysqli_fetch_assoc($execriResult)){
                $index++;
                $rowToAdd = [];
                $examId = $exam["ExamId"];
                
                array_push($rowToAdd, $examId);
                array_push($rowToAdd, $exam["Name"]);
                array_push($rowToAdd, $exam["Description"]);
                $cretedDate = new DateTime($exam["CreatedDate"]);
                $createdDateFormated = $cretedDate->format("m-d-Y");
                array_push($rowToAdd, $createdDateFormated);

                $rowToAdd["ResultId"] = $examResultID;
                $execires["ClassId_" . $index] = $rowToAdd;
            }

            // lấy tài liệu ra để thể hiện
            // $execriResult = $examModel->getListExamsByClassIdWithExamType($classId);

            // while($exam = mysqli_fetch_assoc($execriResult)){
            //     $rowToAdd = [];
            //     $examId = $exam["ExamId"];
                
            //     array_push($rowToAdd, $examId);
            //     array_push($rowToAdd, $exam["Name"]);
            //     array_push($rowToAdd, $exam["Description"]);
            //     $cretedDate = new DateTime($exam["CreatedDate"]);
            //     $createdDateFormated = $cretedDate->format("m-d-Y");
            //     array_push($rowToAdd, $createdDateFormated);

            //     $rowToAdd["ResultId"] = $examResultID;
            //     $execires["ClassId_" . $classId] = $rowToAdd;
            // }
        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_listResourceClass",
            "title"                          => "Dữ liệu lớp học",
            "menu"                           => "simple2_student_menu",
            "errors"                         => $errors,
            "examinations"                   => $examinations,
            "execires"                       => $execires,
        ]);   
    }


    //local func
    private function getAllQuestionOfExam($question_model, $answer_model, $exam_id){

        $allQuestionOfExam = $question_model->getAllQuestionOfExam($exam_id);


        $ArrQuestions = [];


        while ($row = mysqli_fetch_array($allQuestionOfExam)){

            $ques = new Question();

            $ques->id = $row["QuestionId"];
            $ques->Content = base64_decode($row["Content"]);
            $ques->listAnswerOfQuestion = [];



            $allAnswerOfQuestion = $answer_model->getAllAnswerOfQuestion($ques->id);

            while ($row2 = mysqli_fetch_array($allAnswerOfQuestion)) {
                $ans = new Answer();

                $ans->id = $row2["AnswerId"];
                $ans->Content = base64_decode($row2["Content"]);
                $ans->is_Correct = $row2["Is_correct"];

                $ques->listAnswerOfQuestion[] = $ans;
            }



            $ArrQuestions[] = $ques;
        }

        return $ArrQuestions;
    }

    private function getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_id, $result_id, $user_id){

        $allQuestionOfExam = $question_model->getAllQuestionOfExam($exam_id);


        $ArrQuestions = [];


        while ($row = mysqli_fetch_array($allQuestionOfExam)){

            $ques = new Question();

            $ques->id = $row["QuestionId"];
            $ques->Content = base64_decode($row["Content"]);
            $ques->listAnswerOfQuestion = [];



            $allAnswerOfQuestion = $answer_model->getAllAnswerOfQuestion($ques->id);

            $user_answer = mysqli_fetch_array($user_answer_model->getAnswerOfUser($result_id, $ques->id));

            while ($row2 = mysqli_fetch_array($allAnswerOfQuestion)){
                $ans = new UserAnswer();


                $ans->id = $row2["AnswerId"];
                $ans->Content = base64_decode($row2["Content"]);
                $ans->is_Correct = $row2["Is_correct"];

                if($user_answer["AnswerId"] == $ans->id){
                    $ans->is_UserChoose = true;
                    $ques->Is_have_answer_choosed = true;

                }


                $ques->listAnswerOfQuestion[] = $ans;
            }



            $ArrQuestions[] = $ques;
        }

        return $ArrQuestions;
    }

}



class Question{

    public $id;

    public $Content;

    public $listAnswerOfQuestion;

    public $Is_have_answer_choosed = false;
}

class Answer{

    public $id;

    public $Content;

    public $is_Correct;
}

class UserAnswer{

    public $id;

    public $Content;

    public $is_Correct;

    public $is_UserChoose;
}

class Result{

    public $exam_name;

    public $class_name;

    public $time_join;

    public $time_name;

    public $score;

    public $result_id;

    public $is_completed;

    public $type_name;
}

?>
