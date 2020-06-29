<?php

class Examination extends Controller{

    public function __construct() {
        
        if(!$this->is_Login()){
            $this->redirect("Home");
            exit;
        }

    }




    public function index(){

        $this->redirect("Examination/listExams");

        exit;

        $this->view("simple", [
			"Page"  			=> "simple_view_list_exam",
			"title" 			=> "Danh sách các bài thi"
		]);
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
    		$newExamResultID = $examResultModel->addExamResult($userid, $exam_id, $date);

            //add câu trả lời rỗng cho user
            $ArrQuestions = $this->getAllQuestionOfExam($questionModel, $answerModel, $exam_id);

            foreach ($ArrQuestions as $question){

                $userAnswerModel->addUserAnswer($question->id, $userid, "NULL", $newExamResultID);

            }


            $this->redirect("Examination/doExam/" . $newExamResultID);

            exit;

    	}else{

            $this->redirect("Examination/doExam/" . $examResultID);
            exit;
        }
    }

    public function doExam($exam_result_id){

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




        $exam_result_id = $this->clear($exam_result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($exam_result_id));

        $is_completed = $examResultModel->checkExamResultIsCompleted($exam_result_id);

        if($is_completed){
            $this->redirect("Examination/viewResultExam/" . $exam_result_id);
            exit;
        }



        $timePassed = (int)$examResultModel->getTimePassed($exam_result_id, date('Y-m-d H:i:s'));

        $exam = mysqli_fetch_array($examModel->getExam($exam_result["exam_id"]));

        $timeWork = ((int)$exam["time"]) * 60;

        if(($timeWork - $timePassed) <= 0){

        //lúc này là hết thời gian
            $this->redirect("Examination/submitExam/" . $exam_result_id);
            exit;

        }

        //còn thời gian thì cho làm tiếp ở đây

        
        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam["id"], $exam_result_id, $this->getUserId());



        $this->view("simple", [
            "Page"                  => "simple_joined_exam",
            "title"                 => "Đang thi....",
            "all_question"          => $ArrQuestions,
            "description_of_exam"   => $exam["description"],
            "time_left"             => $timeWork - $timePassed,
            "exam_result_id"        => $exam_result_id
        ]);
    }

    public function submitExam($exam_result_id){
        //Nộp bài

        $exam_result_id = $this->clear($exam_result_id);

        $examResultModel = $this->model("ExamResultsModel");
        $examResultModel->updateStatusExamResult($exam_result_id, 1);

        $this->redirect("Examination/viewResultExam/".$exam_result_id);
        exit;
    }

    public function viewResultExam($exam_result_id){

        //Load model

        $examResultModel = $this->model("ExamResultsModel");

        $examModel = $this->model("ExamsModel");

        $question_model = $this->model("QuestionModel");

        $answer_model = $this->model("AnswerModel");

        $user_answer_model = $this->model("UserAnswerModel");



        $exam_result_id = $this->clear($exam_result_id);

        $exam_result = mysqli_fetch_array($examResultModel->getExamResult($exam_result_id));

        if($exam_result == null){
            $this->redirect("Examination/viewListResultExam");
        }

        $exam = mysqli_fetch_array($examModel->getExam($exam_result["exam_id"]));


        $ArrQuestions = $this->getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam["id"], $exam_result_id, $this->getUserId());

        /*
        echo "<pre>";
        print_r($ArrQuestions);
        echo "</pre>";
        */

        $this->view("simple", [
            "Page"                  => "simple_view_result_exam",
            "title"                 => "Kết quả thi",
            "all_question"          => $ArrQuestions,
            "description_of_exam"   => $exam["description"]
        ]);
    }

    public function viewListResultExam(){


        $user_id = $this->getUserId();


        // load model 

        $examResultModel = $this->model("ExamResultsModel");

        $allExamResultOfUser = $examResultModel->getAllExamResultOfUser($user_id);


        $this->view("simple", [
            "Page"              => "simple_view_list_result_exam",
            "title"             => "Danh sách các bài thi đã tham gia",
            "allExamResultOfUser"   => $allExamResultOfUser
        ]);
    }

    public function viewExam($exam_id){

        $user_id = $this->getUserId();

		$examsmodel = $this->model("ExamsModel");

        $examResultModel = $this->model("ExamResultsModel");

        if($examResultModel->checkUserDoingExam($user_id)){
            echo "<script>alert('Vui lòng hoàn tất vài thi hiện để có thể tham gia bài thi mới !');</script>";
            $this->redirect("Examination/viewListResultExam");
            exit;
        }

        
		$exam = mysqli_fetch_array($examsmodel->getExam($this->clear($exam_id)));

        if($exam == null){
            $this->redirect("Examination/listExams");
        }
		//echo "<a href='".Config::$base_url."Examination/joinExam/$exam_id'>".$exam['description']."</a>";


    	$this->view("simple", [
			"Page"  			=> "simple_view_exam",
			"title" 			=> "Xem bài thi",
            "description"       => $exam["description"],
            "time"              => $exam["time"],
            "exam_id"           => $exam_id,
            "subject_name"      => $exam["subject_name"],
            "grade_name"        => $exam["grade_name"],
            "teacher_name"      => $exam["teacher_name"]
		]);
	}

	public function listExams(){

		$examsmodel = $this->model("ExamsModel");

		$results = $examsmodel->getListExams(0, 10);

		
        $this->view("simple", [
            "Page"              => "simple_view_list_exam",
            "title"             => "Danh sách các bài thi",
            "list_exam"         => $results
        ]);
	}

    public function answerQuestion(){

        if(isset($_POST["answer"])){

            $exam_result_id = $this->clear($_POST["exam_result_id"]);
            $question_id = $this->clear($_POST["question_id"]);
            $answer_id = $this->clear($_POST["answer"]);

            $user_answer_model = $this->model("UserAnswerModel");
            $user_answer_model->updateAnswer($exam_result_id, $question_id, $answer_id);
        }
    }

    public function findExam(){

        $error = null;

        if(isset($_POST['find'])){

            $exam_id = $this->clear($_POST['exam_id']);


            //load model
            $examsmodel = $this->model("ExamsModel");


            if(mysqli_num_rows($examsmodel->getExam($exam_id)) > 0){
                $this->redirect("Examination/viewExam/".$exam_id);
                exit;
            }else{
                $error = "Không tìm thấy ID bài thi này.";
            }

        }

        $this->view("simple", [
            "Page"              => "simple_view_find_exam",
            "title"             => "Tham gia bài thi theo ID",
            "error"             => $error
        ]);
    }














    private function getAllQuestionOfExam($question_model, $answer_model, $exam_id){

        $allQuestionOfExam = $question_model->getAllQuestionOfExam($exam_id);


        $ArrQuestions = [];


        while ($row = mysqli_fetch_array($allQuestionOfExam)){

            $ques = new Question();

            $ques->id = $row["id"];
            $ques->Content = $row["content"];
            $ques->listAnswerOfQuestion = [];



            $allAnswerOfQuestion = $answer_model->getAllAnswerOfQuestion($ques->id);

            while ($row2 = mysqli_fetch_array($allAnswerOfQuestion)) {
                $ans = new Answer();

                $ans->id = $row2["id"];
                $ans->Content = $row2["content"];
                $ans->is_Correct = $row2["is_correct"];

                $ques->listAnswerOfQuestion[] = $ans;
            }



            $ArrQuestions[] = $ques;
        }

        return $ArrQuestions;
    }

    private function getAllQuestionAndAnswerOfUser($question_model, $answer_model, $user_answer_model, $exam_id, $exam_result_id, $user_id){

        $allQuestionOfExam = $question_model->getAllQuestionOfExam($exam_id);


        $ArrQuestions = [];


        while ($row = mysqli_fetch_array($allQuestionOfExam)){

            $ques = new Question();

            $ques->id = $row["id"];
            $ques->Content = $row["content"];
            $ques->listAnswerOfQuestion = [];



            $allAnswerOfQuestion = $answer_model->getAllAnswerOfQuestion($ques->id);

            $user_answer = mysqli_fetch_array($user_answer_model->getAnswerOfUser($exam_result_id, $user_id, $ques->id));

            while ($row2 = mysqli_fetch_array($allAnswerOfQuestion)) {
                $ans = new UserAnswer();


                $ans->id = $row2["id"];
                $ans->Content = $row2["content"];
                $ans->is_Correct = $row2["is_correct"];

                if($user_answer["answer_id"] == $ans->id){
                    $ans->is_UserChoose = true;
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
