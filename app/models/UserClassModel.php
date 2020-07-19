<?php
class UserClassModel extends DB{

    public function checkUserJoinClass($userId, $classId){

        $qr = "UserClass_checkUserJoinClass($userId, $classId)";
        mysqli_next_result($this->con);

        if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0 ){
            return true;
        }

        return false;
    }

    public function getListStudentJoinClass($classId){
        $qr = "CALL UserClass_getListStudentJoinClass($classId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        
        return $result;
    }

    public function insertUserClass($userId, $classId){
        $qr = "CALL UserClass_insertUserClass($userId, $classId)";
        mysqli_next_result($this->con);

        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function isRequestJoinClass($userId, $classId){
        $qr = "CALL UserClass_isRequestJoinClass($userId, $classId)";
        mysqli_next_result($this->con);
        // echo $qr;
        if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
            return true;
        }

        return false;
    }

    public function getTotalUserJoinedClass($classId){
        $qr = "CALL UserClass_getTotalUserJoinedClass($classId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        $total = mysqli_fetch_assoc($result)["ToTalStudent"];

        return (int)$total;
    }

    public function getListUserRequestJoinClass($classId){
        $qr = "CALL UserClass_getListUserRequestJoinClass($classId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);

        return $result;
    }

    public function approveStudentJoinClass($classId, $studentId){
        $qr = "CALL UserClass_approveStudentJoinClass($classId, $studentId)";
        mysqli_next_result($this->con, $qr);
        
        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

}?>