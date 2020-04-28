<?php
class Controller{

    public function model($model){
        require_once "./app/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./app/views/".$view.".php";
    }

    public function clear($str){
    	return str_replace(array("'", '"'), array("&apos;", "&quot;"), trim($str));
    }

    public function is_Login(){
    	if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function is_Admin(){
    	if(isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['permission'] == 3){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function is_Employee(){
    	if(isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['permission'] == 2){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function redirect($target){
    	echo "<script>window.location='".Config::$base_url.$target."';</script>";
    }
    
    public function upload($tmp_name, $path, $size){

        $types = array("png", "jpg", "jpeg");

        $type = strtolower(pathinfo($path, PATHINFO_EXTENSION));


        if(in_array($type, $types)){

            if($size <= 5*1024*1024){

                if(move_uploaded_file($tmp_name, $path)){
                    return true;
                }else{
                    return "Upload không thành công.";
                }

            }else{
                return "Chỉ được upload ảnh không quá 5MB.";
            }

        }else{
            return "Chỉ được upload ảnh.";
        }


    }

}
?>