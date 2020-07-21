<?php

	class RoleModel extends DB{

        public function getListRoles(){
            $qr = "CALL Role_GetListRole()";
            $result = mysqli_query($this->con, $qr);

            return $result;
        }
    
    }

?>