<?php

	class UserModel extends DB{

		//Kiểm tra xem user đó có tồn tại trong csdl hay chưa
		public function checkExistedUser($email){
			$qr = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
      if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
        return true;
      }

      return false;
		}

		//Kiểm tra user và password có đúng ko
		public function checkUserAndPasswordIsCorrect($email, $password){
			$password = md5($password);
			$qr = "SELECT username, fullname, role_id FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
			$result = mysqli_query($this->con, $qr);
    	return $result;
    }

    //Thêm user mới với quyền mặc định là 1
    public function addUser($username, $password, $email, $fullname, $role_id = 1){
    	$password = md5($password);
    	$qr = "INSERT INTO users(username, password, email, fullname, role_id) VALUES ('$username', '$password', '$email', '$fullname', '$role_id')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

		//xoa user trong database
		public function deleteUser($email)
		{
			$qr = "DELETE FROM users WHERE email='$email'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

		//thay doi quyen cho users
		public function changePermission($permissionId, $userId)
		{
			$qr = "UPDATE users SET role_id='$permissionId' WHERE id='$userId'";
			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

		//update thong tin ca nhan
		public function updateUserInformation($fullname, $username, $password, $userId)
		{
			$password = md5($password);
			$qr = "UPDATE users SET fullname='$fullname',
															username='$username',
															password='$password'
													WHERE id='$userId'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}
	}

?>
