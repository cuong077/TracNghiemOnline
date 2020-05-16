<?php

class Admin extends Controller{

    function index(){

        $this->view("admin", [
			"Page"  			=> "admin_dashboard",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);

    }
    function addExam(){
		$this->view("admin", [
			"Page"  			=> "admin_addexam",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);
	}

	function danhsachuser(){
		$this->view("admin", [
			"Page"  			=> "admin_danhsachuser",
			"title" 			=> "Danh sách các user"
		]);
	}
	function suauser(){
		$this->view("admin", [
			"Page"  			=> "admin_suauser",
			"title" 			=> "Các user đã chọn"
		]);
	}
	function danhsachbaithi(){

		$this->view("admin", [
			"Page"  			=> "admin_danhsachbaithi",
			"title" 			=> "Các user đã chọn"
		]);
	}


	function suabaithi(){
		$this->view("admin", [
			"Page"  			=> "admin_suabaithi",
			"title" 			=> "Các bài thi đã chọn"
		]);
	}

	

	function addSubject($subjectName){
		$error = [];
		$success = "";
  
		if (!$this->is_Admin()) {
			$this->redirect("Home");
		  }
		  else {
			$subjectModel = $this->model("SubjectModel");
  
			//check khong ton tai bai thi
			if ($subjectModel->existSubjectWithName($subjectName)) {
			  if ($subjectModel->addSubject($subjectName)) {
				$success="Thêm môn học thành công.";
			  }
			  else {
				$error["subject"] = "Không thể thêm môn học vào database.";
			  }
			}
			else {
			  $error["subject"] = "Đã tồn tại môn học.";
			}
		}
  
		$this->view("", [
		  "Page"  			=> "",
		  "title" 			=> "",
		  "error"				=> $error,
		  "success"			=> $success
		]);
	  }
  
	function test(){
		
	}






}
?>
