<?php

class Page404 extends Controller{

    function index(){
        
        $this->view("simple", [
            "Page"  => "simple_404",
            "title" => "404 Không tìm thấy"
        ]);

    }

}
?>