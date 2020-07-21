<?php

class Student extends Controller{
  
    public function __construct() {
        if(!$this->is_Student()){
            //$this->redirect("Home");
            //exit;
        }
    }
    

    public function joinExam($exam_id){

      // Khi join vào bài thi hệ thống sẽ kiểm tra người này đã làm bài thi này lần nào chưa?
        // Nếu chưa thì tạo mới và chuyển sang trang làm bài thi
        // Nếu có rồi thì kiểm tra là bài thi này đã làm xong chưa?
        // Nếu đã làm xong thì tạo bài thi mới và chuyển sang làm bài thi
        // Nếu chưa làm xong thì chuyển sang trang làm bài tiếp tục

      $userid = $this->getUserId();


        //Load model

      $examResultModel = $this->model("ExamResultsModel");

      $examModel = $this->model("ExamsModel");

        $userAnswerModel = $this->model("UserAnswerModel");

        $questionModel = $this->model("QuestionModel");

        $answerModel = $this->model("AnswerModel");
        


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

        $examResultModel = $this->model("ExamResultsModel");
        $examResultModel->updateStatusExamResult($result_id, 1);

        $this->redirect("Examination/viewResultExam/".$result_id);
        exit;

    }



    public function ListClasses(){

        $classModel = $this->model("ClassModel");
        $userId = $this->getUserId();
        $classResult = $classModel->getListClassesForStudent($userId);
        $classes = [];

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getListGrades();
        $grades = [];
        $userClassModel = $this->model("UserClassModel");
        $total = 0;
        
        while ($row = mysqli_fetch_assoc($classResult)) {
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

    public function JoinClasses($classId){
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
        $classModel = $this->model("classModel");
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

            if($error == []){
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

?>
