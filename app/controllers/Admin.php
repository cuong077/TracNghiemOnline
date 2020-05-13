<?php

class Admin extends Controller{

    function index(){

        $this->view("admin", [
			"Page"  			=> "admin_dashboard",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);

    }
}
?>
