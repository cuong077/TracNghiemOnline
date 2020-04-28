<?php

class Register extends Controller{

    function index(){
        
        $this->view("simple", [
            "Page"  => "simple_register",
            "title" => "Đăng ký"
        ]);

    }


    public function process(){

        $loginmodel = $this->model("LoginModel");

    	$error = [];
		$success = "";
    	$firstname = $this->clear((isset($_POST['firstname'])?$_POST['firstname']:""));

    	if($firstname == ""){
    		$error["firstname"] = "Họ không được để trống.";
    	}



    	$lastname = $this->clear((isset($_POST['lastname'])?$_POST['lastname']:""));

    	if($lastname == ""){
    		$error["lastname"] = "Tên không được để trống.";
    	}

    	$fullname = $firstname.' '.$lastname;


    	$username = $this->clear((isset($_POST['username'])?$_POST['username']:""));

    	if($username == ""){
    		$error["username"] = "Tài khoản không được để trống.";
    	}else{
            if (!preg_match('/^[0-9A-Za-z_]+$/', $username, $matches)){
                $error["username"] = "Tài khoản không được chứa kí tự đặc biệt.";
            }else{
                if($loginmodel->checkLoginExist($username)){
                    $error["username"] = "Tài khoản đã tồn tại.";
                }
            }
            
        }

    	$password = $this->clear((isset($_POST['password'])?$_POST['password']:""));

    	if($password == ""){
    		$error["password"] = "Mật khẩu không được để trống.";
    	}

    	$repassword = $this->clear((isset($_POST['repassword'])?$_POST['repassword']:""));

    	if($repassword != $password){
    		$error["repassword"] = "Mật khẩu nhập lại không khớp.";
    	}

    	if(count($error)==0){
			
    		$result = $loginmodel->addCustomer($username, $password, $firstname, $lastname, $fullname);

    		if($result){
				$success = "Đăng kí thành công";
    		}else{
    			$success = "Không đăng kí được";
    		}
    	}

		$this->view("simple", [
			"Page"  			=> "simple_register",
			"title" 			=> "Đăng ký",
			"error"				=> $error,
			"back_firstname" 	=> $firstname,
			"back_lastname"		=> $lastname,
			"back_username"		=> $username,
			"success"			=> $success
		]);

    }
    
}
?>