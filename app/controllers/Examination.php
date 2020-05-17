<?php

class Examination extends Controller{

    function index(){

        $this->view("simple", [
			"Page"  			=> "simple_examination",
			"title" 			=> "Đang thi...."
		]);

    }

    function joinExam($id){

    	// kiểm tra trong exam_results có tham gia hay chưa???
    	$userid = $this->getUserId();
    	$examResultModel = $this->model("ExamResultsModel");

    	$examModel = $this->model("ExamsModel");

    	$is_newResult = false;

    	$examResultID = $examResultModel->checkExistExamResultOfUser($userid, $id);

		if($examResultID != null){

    		$is_completed = $examResultModel->checkExamResultIsCompleted($examResultID);

    		if($is_completed){//đã complete
    			$is_newResult = true;
    		}else{//chưa complete
    			//check thời gian
    			
    			$timePassed = (int)$examResultModel->getTimePassed($examResultID, date('Y-m-d H:i:s'));

    			$exam = mysqli_fetch_array($examModel->getExam($id));

    			$timeWork = ((int)$exam["time"]) * 60;

    			if(($timeWork - $timePassed) > 0){
    				echo "còn thời gian";
    			}else{
    				echo "hết thời gian";
    			}

    		}

    	}else{
    		$is_newResult = true;
    	}

    	if($is_newResult){

    		//tạo kết quả mới
    		$date = date('Y-m-d H:i:s');
    		$examResultModel->addExamResult($userid, $id, $date);

    	}else{

    		//làm tiếp bài ôn



    	}
    	


    	
    }

    function viewExam($id){
		$examsmodel = $this->model("ExamsModel");

		$results = $examsmodel->getExam($this->clear($id));


		$exam = mysqli_fetch_array($results);


		echo "<a href='".Config::$base_url."Examination/joinExam/$id'>".$exam['description']."</a>";



    	/*
    	$this->view("simple", [
			"Page"  			=> "simple_xembaithi",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);*/
	}
	function addExam(){
		$this->view("admin", [
			"Page"  			=> "admin_addexam",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);
	}

	function listExams(){

		$examsmodel = $this->model("ExamsModel");

		$results = $examsmodel->getListExams(0, 10);

		while ($row = mysqli_fetch_array($results)) {

			echo "<li><a href='viewExam/".$row['id']."'>".$row['description']."</a></li>";

		}
	}



    

}
?>
