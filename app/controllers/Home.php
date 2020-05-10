<?php

class Home extends Controller{

    function index(){

        $this->view("simple", [
			"Page"  			=> "simple_home",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);

    }
}
?>
