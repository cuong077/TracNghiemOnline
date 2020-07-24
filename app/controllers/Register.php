<?php

class Register extends Controller{

    public function Register(){
		$loginmodel = $this->model("UserModel");
		if(isset($_POST["register"])){
			$userModel  = $this->model("UserModel");

			$error = [];
			$success = "";

			$fullname = $this->clear((isset($_POST['fullname'])?$_POST['fullname']:""));

			if($fullname == ""){
				$error["fullname"] = "Họ và tên không được để trống.";
			}


			$email = $this->clear((isset($_POST['email'])?$_POST['email']:""));

			if($email == ""){
				$error["email"] = "Email không được để trống.";
			}else{
				if (!preg_match('/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/', $email, $matches)){
					$error["email"] = "Không phải là email.";

				}else{	
					if($userModel->checkExistedUser($email)){	
						$error["email"] = "Email đã tồn tại.";	
					}
				}
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

			$password = $this->clear((isset($_POST['password'])?$_POST['password']:""));

			if($password == ""){
				$error["password"] = "Mật khẩu không được để trống.";
			}

			$repassword = $this->clear((isset($_POST['repassword'])?$_POST['repassword']:""));
			
			if($repassword != $password){
				$error["repassword"] = "Mật khẩu nhập lại không khớp.";
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

			$gradeSelect = $this->clear((isset($_POST['gradeSelect'])?$_POST['gradeSelect']:""));

			if(count($error)==0){
				$birthday = new DateTime($birthday);
				$birthdayFormated = $birthday->format("Y-m-d");

				// role_id 3 is student
				$result = $loginmodel->addUser($username, $password, $email, $fullname, 3, $phoneNumber, $birthdayFormated, $gradeSelect);
				
				if($result){
					$success = "Đăng kí thành công";
				}
			}
		}

        $grades = [];
        $gradeMode = $this->model("GradeModel");
		$result = $gradeMode->getListGrades();
        $index = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $rowToAdd = [];

            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($rowToAdd, $row["Description"]);

            $grades[$index] = $rowToAdd;
            $index++;
		}
		
		// var_dump($grades);

		$this->view("simple2", [
			"Page"  			=> "simple2_register",
			"title" 			=> "Đăng ký - Thi trắc nghiệm trức tuyến",
			"error"				=> $error,
			"back_fullname" 	=> $fullname,
			"back_birthday" 	=> $birthday,
			"back_phoneNumber" 	=> $phoneNumber,
			"back_email"		=> $email,
			"back_username"		=> $username,
			"success"			=> $success,
			"grades"			=> $grades
		]);
	}
 
}
?>