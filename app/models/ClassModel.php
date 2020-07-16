<?php
class ClassModel extends DB{

    //add class to db
    public function addClass($className, $classDescription, $password, $userId, $gradeId){
        $qr = "CALL Class_addClass('$className', '$classDescription', '$password', $userId, $gradeId)";
        mysqli_next_result($this->con);

        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }
    
    public function checkExistsClassByName($className, $gradeId){
        $className = trim($className);
        $qr = "CALL Class_checkExistsClassByName('$className', $gradeId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        echo $qr;
        
        if(mysqli_num_rows($result)){
            return true;
        }

        return false;
    }
}
?>
