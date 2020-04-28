<?php

class Login extends Controller{

    public function index(){
        
        $this->view("simple", [
            "Page"  => "simple_login",
            "title" => "Đăng nhập"
        ]);

    }

    public function process(){

    	$error = null;

    	if(isset($_POST["login"])){

    		$username = $this->clear($_POST["username"]);
    		$password = $this->clear($_POST["password"]);

    		if($username == "" || $password == ""){
    			$error = "Tài khoản hoặc mật khẩu không được để trống.";
    		}else{


    			$loginModel = $this->model("LoginModel");

	    		$result = $loginModel->checkUserPasswordExist($username, md5($password));

	    		if($result != null){
	    			
	    			$_SESSION['username'] = $result['username'];
	    			$_SESSION['password'] = $result['password'];
	    			$_SESSION['permission'] = $result['permission'];

	    			$this->redirect("Home");
	    			exit;

	    		}else{
	    			$error = "Tài khoản hoặc mật khẩu không đúng.";
	    		}
    		}
    		

    	}

    	$this->view("simple", [
		    "Page"  => "simple_login",
		    "title" => "Đăng nhập",
		    "error" => $error
		]);

    }



    
}
?>