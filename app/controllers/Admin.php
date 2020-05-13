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
}
?>
