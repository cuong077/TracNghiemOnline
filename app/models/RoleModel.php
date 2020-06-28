<?php

	class RoleModel extends DB{

        public function getListRoles(){
            $qr = "SELECT * FROM roles";
            $result = mysqli_query($this->con, $qr);
            return $result;
        }
    
    }

?>