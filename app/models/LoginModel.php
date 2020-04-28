<?php
    class LoginModel extends DB{
        
        public function checkUserPasswordExist($username, $password){
            $qr = "SELECT * FROM login where username = '$username' and password = '$password' limit 1";
        	return mysqli_fetch_array(mysqli_query($this->con, $qr));
        }

        function checkLoginExist($username){
            $qr = "SELECT * FROM login where username = '$username' limit 1";
            if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
                return true;
            }
            return false;
        }

        public function addCustomer($username, $password, $firstname, $lastname, $fullname){

        	$password = md5($password);

        	$qr = "INSERT INTO login(username, password, permission) values ('$username', '$password', '1')";
			
        	if(mysqli_query($this->con, $qr)){
        		$last_id = $this->con->insert_id;

        		$qr2 = "INSERT INTO customers(cus_id, firstname, lastname, fullname) values ('$last_id', '$firstname', '$lastname', '$fullname')";

        		if(mysqli_query($this->con, $qr2)){
        			return true;
        		}
        	}

        	return false;
        }
    }
?>