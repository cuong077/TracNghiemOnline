<?php

class Register extends Controller{

    function index(){
        echo "Hello đây là trang đăng ký";

        echo '<form action="Register/process" method="post">
	
			fullname :
			<input type="text" name="fullname" />
			<br>

			email :
			<input type="text" name="email" />
			<br>

			username :
			<input type="text" name="username" />
			<br>

			password :
			<input type="text" name="password" />
			<br>

			re password :
			<input type="text" name="repassword" />
			<br>

			
			<input type="submit" name="register">
			<br>
		</form>';

    }

    public function process(){

    	//Nếu get trực tiếp thì chuyển về form đăng kí
    	if(!isset($_POST['register']))
    		$this->redirect("Register");


        $loginmodel = $this->model("UserModel");

    	$error = [];
		$success = "";


    	$fullname = $this->clear((isset($_POST['fullname'])?$_POST['fullname']:""));

    	if($fullname == ""){
    		$error["fullname"] = "Tên đầy đủ không được để trống.";
    	}


    	$email = $this->clear((isset($_POST['email'])?$_POST['email']:""));

    	if($email == ""){
    		$error["email"] = "Email không được để trống.";
    	}else{
    		if (!preg_match('/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/', $email, $matches)){
                $error["email"] = "Không phải là email.";
            }
    	}


    	$username = $this->clear((isset($_POST['username'])?$_POST['username']:""));

    	if($username == ""){
    		$error["username"] = "Tài khoản không được để trống.";
    	}else{
            if (!preg_match('/^[0-9A-Za-z_]+$/', $username, $matches)){
                $error["username"] = "Tài khoản không được chứa kí tự đặc biệt.";
            }else{
                if($loginmodel->checkExistedUser($username)){
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
			
    		$result = $loginmodel->addUser($username, $password, $email, $fullname);

    		if($result){
				$success = "Đăng kí thành công";
    		}else{
    			$success = "Không đăng kí được";
    		}
    	}

    	print_r($error);
    	print_r($success);

/*
		$this->view("simple", [
			"Page"  			=> "simple_register",
			"title" 			=> "Đăng ký",
			"error"				=> $error,
			"back_firstname" 	=> $firstname,
			"back_lastname"		=> $lastname,
			"back_username"		=> $username,
			"success"			=> $success
		]);
*/
    }

}
?>