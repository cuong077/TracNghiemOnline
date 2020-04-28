<?php
class App{

    protected $controller="Home";
    protected $action="index";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
 
        // Controller
        $is_default_controller = true;
        if(trim($arr[0]) != "" && isset($arr[0])){
            if( file_exists("./app/controllers/".$arr[0].".php") ){
                $this->controller = $arr[0];
                unset($arr[0]);
                $is_default_controller = false;
            }else{

                echo "<script>window.location='".Config::$base_url.Config::$page_404."';</script>";
                exit;
            }
        }
        
        
        require_once "./app/controllers/". $this->controller .".php";
        $controller = new $this->controller;

        // Action
        $action_exist = false;
        $is_default_action = true;
        if(isset($arr[1])){
            if( method_exists( $controller , $arr[1]) ){
                $this->action = $arr[1];
                $action_exist = true;
            }
            unset($arr[1]);
            $is_default_action = false;
        }

        if(!$is_default_controller && !$action_exist && !$is_default_action){
            echo "<script>window.location='".Config::$base_url.Config::$page_404."';</script>";
            exit;
        }


        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$controller, $this->action], $this->params );

    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>