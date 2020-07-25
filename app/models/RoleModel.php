<?php

	class RoleModel extends DB{

        public function getListRoles(){
            $qr = "CALL Role_GetListRole()";
            mysqli_next_result($this->con);

            $result = mysqli_query($this->con, $qr);

            return $result;
        }
    
    }

?>