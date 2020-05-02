<?php

class Login extends Controller{

  function index(){
    echo "Hello đây là trang login";

    echo '<form action="Login/process" method="post">

		email :
		<input type="text" name="email" />
		<br>

		password :
		<input type="text" name="password" />
		<br>

		<input type="submit" name="Login">
		<br>
	</form>';

  }

  public function process(){

  	//Nếu get trực tiếp thì chuyển về form đăng kí
  	if(!isset($_POST['login']))
  	 $this->redirect("login");

    $loginmodel = $this->model("UserModel");

  	$error = [];
	  $success = "";

  	$email = $this->clear((isset($_POST['email'])?$_POST['email']:""));

  	if($email == ""){
  	  $error["email"] = "Vui lòng nhập email.";
  	}
    else {
    	if (!preg_match('/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/', $email, $matches)){
        $error["email"] = "Email không hợp lệ.";
      }
  	}

  	$password = $this->clear((isset($_POST['password'])?$_POST['password']:""));

  	if($password == ""){
  	$error["password"] = "Vui lòng nhập mật khẩu.";
  	}

  	if(count($error)==0){
  	  $result = $loginmodel->checkUserAndPasswordIsCorrect($email, $password);

    	if(mysqli_num_rows($result)>0){
  		  $error = "Email hoặc mật khẩu sai.";
  	  }
      else{
  		  $row = mysqli_fetch_array($result);
        $this->addSessionValue("username", $row["username"]);
        $this->addSessionValue("permission", $row["role_id"]);
        $this->redirect("home");
  	  }
  	}

  	print_r($error);
  	print_r($success);
  }
}
?>
