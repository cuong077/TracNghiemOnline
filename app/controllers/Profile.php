<?php	

class Profile extends Controller{	
    //constructor check login and correct UserId	
    public function __construct(){	
    	if(!$this->is_Login()){	
    		$this->redirect("Home");	
    		exit;	
    	}	
    }	

    public function EditProfile(){	

        $userId = $this->getUserId();	
        $isTeacher = $this->is_Teacher();	
        $menu = "";	
        $error = [];	

        //check role user	
        if($isTeacher == true){	
            $menu = "simple2_teacher_menu";	
        }	
        else {	
            $menu = "simple2_student_menu";	
        }	

        //get info user	
        $userModel = $this->model("UserModel");	
        $userResult = $userModel->getUser($userId);	
        $user = mysqli_fetch_assoc($userResult);	
        // $userModel = $this->model("UserModel");	


        if(isset($_POST["updateProfile"])){	

            //check data valid	
            $fullname = $this->clear((isset($_POST['fullname'])?$_POST['fullname']:""));	

			if($fullname == ""){	
				$error["fullname"] = "Họ và tên không được để trống.";	
            }	

			$username = $this->clear((isset($_POST['username'])?$_POST['username']:""));	

			if($username == ""){	
				$error["username"] = "Tài khoản không được để trống.";	
			}	
			else{	
				if (!preg_match('/^[0-9A-Za-z_]+$/', $username, $matches)){	
					$error["username"] = "Tài khoản không được chứa kí tự đặc biệt.";	
				}	
			}	

            $birthday = $this->clear((isset($_POST['birthday'])?$_POST['birthday']:""));	
			if($birthday == ""){	
				$error["birthday"] = "Vui lòng chọn ngày sinh.";	
			}	
			else{	
				$from = new DateTime($birthday);	
				$to = new DateTime('today');	
				$age = $from->diff($to)->y;	

				if($age <= 10) {	
					$error["birthday"] = "Học sinh cần trên 10 tuổi.";	
				}	
            }	

            $phoneNumber = $this->clear((isset($_POST['phoneNumber'])?$_POST['phoneNumber']:""));	
			if($phoneNumber == ""){	
				$error["phoneNumber"] = "Số điện thoại không được để trống.";	
			}	
			else{	
				if(!preg_match('/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/', $phoneNumber, $matches)){	
					$error["phoneNumber"] = "Số điện thoại không đúng định dạng.";	
				}	
			}	

            // var_dump($error);	
            //update to database	

            if($error == []){	
                // echo "Update to database";	
                $birthday = new DateTime($birthday);	
				$birthdayFormated = $birthday->format("Y-m-d");	
                $result = $userModel->updateProfile($username, $fullname, $phoneNumber, $birthdayFormated, $userId);	
                $this->redirect("Profile/EditProfile");	
            }	
        }	

        $this->view("simple2", [	
            "Page"          => "simple2_editProfile",	
            "title"         => "Cập nhật thông tin cá nhân",	
            "menu"	    	=> $menu,	
            "user"	    	=> $user,	
            "error"         => $error	
        ]);        	
    }	

    public function ChangePassword(){	

        $userId = $this->getUserId();	
        $isTeacher = $this->is_Teacher();	
        $menu = "";	
        $error = [];	

        //check role user	
        if($isTeacher == true){	
            $menu = "simple2_teacher_menu";	
        }	
        else {	
            $menu = "simple2_student_menu";	
        }	

        //get info user	
        $userModel = $this->model("UserModel");	
        $userResult = $userModel->getUser($userId);	
        $user = mysqli_fetch_assoc($userResult);	
        $password = $user["Password"];	

        if(isset($_POST["updatePassword"])){	
            $passwordCurrent = $_POST["passwordCurrent"];	
            $passwordInput = $_POST["password"];	
            $repasswordInput = $_POST["repassword"];	

            if(!isset($passwordCurrent) || $passwordCurrent==""){	
                $error["passwordCurrent"] = "Vui lòng nhập mật khẩu hiện tại.";	
            }	
            else{	
                $isCorrectPassword = $userModel->checkIsCorrectPassword($userId, $passwordCurrent);	
                if($isCorrectPassword == false){	
                    $error["passwordCurrent"] = "Mật khẩu hiện tại không chính xác.";	
                }	
            }	

            if(!isset($passwordInput) || $passwordInput==""){	
                $error["password"] = "Mật khẩu không được để trống.";	
            }	

            if(!isset($repasswordInput) || $repasswordInput==""){	
                $error["repassword"] = "Vui lòng nhập lại mật khẩu.";	
            }	
            else{	
                if($passwordInput != $repasswordInput){	
                    $error["repassword"] = "Mật khẩu nhập lại không khớp.";	
                }	
            }	

            if($error == []){	
                //update password to db	
                $result = $userModel->updatePassword($userId, $passwordInput);	

            }	
        }	


        $this->view("simple2", [	
            "Page"          => "simple2_changePassword",	
            "title"         => "Cập nhật mật khẩu",	
            "menu"	    	=> $menu,	
            "error"         => $error	
        ]);        	
    }	
}	
?>