<?php
class Teacher extends Controller{
    

	public function index(){

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_index",
	      "title"       => "Quản trị của giáo viên",
	      "menu"		=> "simple2_teacher_menu"
	    ]);

	}


	public function createExamSelection(){

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_exam_selection",
	      "title"       => "Tạo đề thi",
	      "menu"		=> "simple2_teacher_menu"
	    ]);

	}


	public function createExamManualStep1(){


		//load model
		$grades_model = $this->model("GradeModel");
		$exam_time_model = $this->model("ExamTimeModel");


		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_exam_manual_step1",
	      "title"       => "Tạo đề thi",
	      "grades"		=> $grades_model->getListGrades(),
	      "exam_time"	=> $exam_time_model->getListExamTime()
	    ]);


	}

	public function createExamManualStep2(){

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_exam_manual_step2",
	      "title"       => "Tạo đề thi"
	    ]);

	}

}
?>