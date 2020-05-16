<?php

class Login extends Controller{

  function index(){

    if($this->is_Login()){
      $this->redirect("Home");
      exit;
    }

    $this->view("simple", [
      "Page"        => "simple_login",
      "title"       => "Đăng nhập - Thi trắc nghiệm trức tuyến"
    ]);

  }

  public function process(){

  	//Nếu get trực tiếp thì chuyển về form đăng kí
  	if(!isset($_POST['login'])){
  	 $this->redirect("Login");
     exit;
    }


    if($this->is_Login()){
      $this->redirect("Home");
      exit;
    }

    $loginmodel = $this->model("UserModel");

  	$error = "";

  	$email = $this->clear((isset($_POST['email'])?$_POST['email']:""));

  	if($email == ""){
  	  $error = "Vui lòng nhập email.";
  	}
    else {
    	if (!preg_match('/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/', $email, $matches)){
        $error = "Email không hợp lệ.";
      }else{

        $password = $this->clear((isset($_POST['password'])?$_POST['password']:""));

        if($password == ""){
         $error = "Vui lòng nhập mật khẩu.";
        }else{

          if($error == ""){
            $result = $loginmodel->checkUserAndPasswordIsCorrect($email, $password);

            if(mysqli_num_rows($result) == 0){
              $error = "Email hoặc mật khẩu sai.";
            }
            else{
              $row = mysqli_fetch_array($result);
              $this->addSessionValue("username", $row["username"]);
              $this->addSessionValue("permission", $row["role_id"]);
              $this->redirect("Home");
              exit;
            }
          }

        }


      }
  	}

  	

  	

  	

    $this->view("simple", [
      "Page"        => "simple_login",
      "title"       => "Đăng nhập - Thi trắc nghiệm trức tuyến",
      "error"      => $error
    ]);

  }
}
?>
