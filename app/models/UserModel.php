<?php

	class UserModel extends DB{

		//Kiểm tra xem user đó có tồn tại trong csdl hay chưa
		public function checkExistedUser($email){
			$qr = "CALL User_GetUser('$email')";
			if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
				return true;
			}

    		return false;
		}

		//Kiểm tra user và password có đúng ko
		public function checkUserAndPasswordIsCorrect($email, $password){
			$password = md5($password);
			$qr = "CALL User_CheckUsernameAndPasswordIsCorrect('$email', '$password')";
			$result = mysqli_query($this->con, $qr);
			
	    	return $result;
	    }

		//Thêm user mới với quyền mặc định là 1
		public function addUser($username, $password, $email, $fullname, $role_id = 1){
			$password = md5($password);
			$qr = "CALL User_InsertUser('$username', '$password', '$email', '$fullname', $role_id);";
			echo $qr;

			$result = mysqli_query($this->con, "CALL User_InsertUser('tesst', '45eea262ec1d46cc5ee3817bc821e757', 'thanhdinh@gmail.com', 'dinh', 2)");
			print_r("result: " . $result . ".");

    		// return false;
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
		public function updateUserInformation($fullname, $username, $role_id, $userId)
		{
			$qr = "UPDATE users SET fullname='$fullname', username='$username', role_id=$role_id WHERE id=$userId";
			
			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

		public function getListUsersWithoutCurrentUser($currentUserId){
			$qr = "CALL User_GetUserWithoutCurrentUser($currentUserId)";
			echo $qr;
			// $result = mysqli_query($this->con, $qr);
			// if (mysqli_num_rows($result) > 0) {
			// 	return $result;
			// }
			
			// return null;
		}

		public function getUser($userId){
			$qr = "SELECT username, fullname, r.description AS permissionName, u.id AS user_id, r.id AS role_id, email FROM users u JOIN roles r ON r.id = u.role_id WHERE u.id = $userId LIMIT 1";
			// echo $qr;
			$result = mysqli_query($this->con, $qr);
			if (mysqli_num_rows($result) > 0) {
				return $result;
			}
			
			return null;
		}
	}

?>