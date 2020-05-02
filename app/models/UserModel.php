<?php

	class UserModel extends DB{

		//Kiểm tra xem user đó có tồn tại trong csdl hay chưa
<<<<<<< HEAD
		public function checkExistedUser($email){
			$qr = "SELECT * FROM users where email = '$email' limit 1";
      if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
          return true;
      }

      return false;
		}

		//Kiểm tra user và password có đúng ko
		public function checkUserAndPasswordIsCorrect($email, $password){
			$password = md5($password);
			$qr = "SELECT username, fullname, role_id FROM users where email = '$email' and password = '$password' limit 1";
			$result = mysqli_query($this->con, $qr);
    	return $result;
    }

    //Thêm user mới với quyền mặc định là 1
    public function addUser($username, $password, $email, $fullname, $role_id = 1){

    	$password = md5($password);

    	$qr = "INSERT INTO users(username, password, email, fullname, role_id) values ('$username', '$password', '$email', '$fullname', '$role_id')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }
	}


?>
=======
		public function checkExistedUser($username){
			$qr = "SELECT * FROM users where username = '$username' limit 1";
            if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
                return true;
            }
            return false;
		}


		//Kiểm tra user và password có đúng ko
		public function checkUserAndPasswordIsCorrect($username, $password){
            $qr = "SELECT * FROM users where username = '$username' and password = '$password' limit 1";
        	return mysqli_fetch_array(mysqli_query($this->con, $qr));
        }


        //Thêm user mới với quyền mặc định là 1
        public function addUser($username, $password, $email, $fullname, $role_id = 1){

        	$password = md5($password);

        	$qr = "INSERT INTO users(username, password, email, fullname, role_id) values ('$username', '$password', '$email', '$fullname', '$role_id')";
			
        	if(mysqli_query($this->con, $qr)){
        		return true;
        	}

        	return false;
        }
	}


?>
>>>>>>> master
