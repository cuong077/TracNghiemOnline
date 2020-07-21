<?php

	class UserModel extends DB{

		//Kiểm tra xem user đó có tồn tại trong csdl hay chưa
		public function checkExistedUser($email){
			$qr = "CALL User_GetUser('$email')";

			$result = mysqli_query($this->con, $qr);

			if(mysqli_num_rows($result) > 0){
				return true;
			}

			return false;
		}

		public function updatePassword($userId, $password){	
			$password = trim($password);	
			$password = md5($password);	
			$qr = "CALL User_updatePassword($userId, '$password')";	
			mysqli_next_result($this->con);	

			if(mysqli_query($this->con, $qr)){	
				return true;	
			}	

			return false;	
		}	

		public function checkIsCorrectPassword($userId, $password){	
			$password = trim($password);	
			$password = md5($password);	
			$qr = "CALL User_checkIsCorrectPassword($userId, '$password')";	
			// echo $qr;	
			mysqli_next_result($this->con);	

			$result = mysqli_query($this->con, $qr);	
			// $isCorrect = mysqli_fetch_assoc($result);	

			if(mysqli_num_rows($result) > 0){	
				return true;	
			}	

			return false;	
		}

		public function updateProfile($username, $fullname, $phoneNumber, $birthday, $userId){	
			$qr = "CALL User_updateProfile('$username', '$fullname', '$phoneNumber', '$birthday', $userId)";	
			mysqli_next_result($this->con);	

			if(mysqli_query($this->con, $qr)){	
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
		
		public function isBlock($email){

			$qr = "CALL User_IsBlock('$email')";
			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);

			return $result;
		}

		public function getListUserRequestJoinClass($classId){
			$qr = "CALL UserClass_getListUserRequestJoinClass($classId)";
			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);

			return $result;			
		}

		//Thêm user mới với quyền mặc định là 3 (student)
		public function addUser($username, $password, $email, $fullname, $role_id = 3, $phoneNumber, $birthday, $gradeSelect){
			$password = md5($password);
			mysqli_next_result($this->con);

			$qr = "CALL User_InsertUser('$username', '$password', '$email', '$fullname', $role_id, '$phoneNumber', '$birthday', $gradeSelect);";
			// echo $qr;
			// exit;
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
			$qr = "UPDATE user SET RoleId='$permissionId' WHERE UserId='$userId'";
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
			$qr = "UPDATE user SET FullName='$fullname', Username='$username', RoleId=$role_id WHERE UserId=$userId";
			
			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

		public function getListUsersWithoutCurrentUser($currentUserId){
			$qr = "CALL User_GetUserWithoutCurrentUser($currentUserId)";
			//echo $qr;
			$result = mysqli_query($this->con, $qr);
			if (mysqli_num_rows($result) > 0) {
				return $result;
			}
			
			return null;
		}

		public function getUser($userId){
			$qr = "CALL User_GetUserById('$userId')";
			$result = mysqli_query($this->con, $qr);
			
			if (mysqli_num_rows($result) > 0) {
				return $result;
			}
			
			return null;
		}

		public function activeUser($userId){
			$qr = "CALL User_UpdateActive(true, '$userId')";
			if(mysqli_query($this->con, $qr)){
				return true;
			}

			return false;
		}

		public function blockUser($userId){
			$qr = "CALL User_UpdateActive(false, '$userId')";
			if(mysqli_query($this->con, $qr)){
				return true;
			}

			return false;
		}
	}

?>