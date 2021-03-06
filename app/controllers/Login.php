<?php

class Login extends Controller{

  function index(){

    if($this->is_Login()){
      $this->redirect("Home");
      exit;
    }

    $this->view("simple2", [
      "Page"        => "simple2_login",
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
            //check block
            //
            $result = $loginmodel->checkUserAndPasswordIsCorrect($email, $password);

            if(mysqli_num_rows($result) == 0){
              $error = "Email hoặc mật khẩu sai.";
            }
            else{

              $blockResult = $loginmodel->isBlock($email);
              $blockRow = mysqli_fetch_assoc($blockResult);
              $isBlock = !(bool)$blockRow["Active"];
              
              if($isBlock == false){

                $row = mysqli_fetch_assoc($result);
                $this->addSessionValue("username", $row["Username"]);
                $this->addSessionValue("permission", $row["RoleId"]);
                $this->addSessionValue("userid", $row["UserId"]);
                $this->addSessionValue("email", $row["Email"]);
                
                $this->redirect("Home");
                exit;
              }
              else{
                $error = "User đang bị khóa.";
              }
            }
          }
        }
      }
  	}

    $this->view("simple2", [
      "Page"        => "simple2_login",
      "title"       => "Đăng nhập - Thi trắc nghiệm trức tuyến",
      "error"      => $error
    ]);
  }
}
?>
