<?php

class Examination extends Controller{

    function index(){

        $this->view("simple", [
			"Page"  			=> "simple_examination",
			"title" 			=> "Đang thi...."
		]);

    }

    function viewExam(){
    	$this->view("simple", [
			"Page"  			=> "simple_xembaithi",
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
