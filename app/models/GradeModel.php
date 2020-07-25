<?php

class GradeModel extends DB
{

    //Them khoi hoc
    public function addGrade($gradeName, $gradeDescription)
    {
        $qr = "CALL Grade_InsertGrade('$gradeName', '$gradeDescription')";
        mysqli_next_result($this->con);

        if (mysqli_query($this->con, $qr)) {
            return true;
        }

        return false;
    }

    public function getGradeNameWithClassId($classId){
        $qr = "CALL Grade_getGradeNameWithClassId($classId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);

        return $result;
    }

    //Xoa khoi hoc
    public function deleteGrade($gradeId)
    {

        $qr = "CALL Grade_DeleteGrade()";
        mysqli_next_result($this->con);

        if (mysqli_query($this->con, $qr)) {
            return true;
        } else {
            return false;
        }
    }

    //Chinh sua ten khoi hoc
    public function updateGrade($gradeId, $gradeName, $gradeDescription)
    {
        $qr = "CALL Grade_UpdateGrade($gradeId, '$gradeName', '$gradeDescription')";
        // echo $qr;
        mysqli_next_result($this->con);

        if (mysqli_query($this->con, $qr)) {
            return true;
        } 
        
        return false;
    }
    
    public function checkExistsGradeName($gradeName){
        $gradeName = trim($gradeName);

        $qr = "CALL Grade_CheckExistsGradeByName('$gradeName')";
        mysqli_next_result($this->con);
        if(mysqli_num_rows(mysqli_query($this->con, $qr))){
            return true;
        }

        return false;
    }

    public function hiddenGrade($gradeId){
        $qr = "CALL Grade_HiddenGrade($gradeId)";
        mysqli_next_result($this->con);

        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function getListGrades()
    {
        $qr = "CALL Grade_GetAllGrades()";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        
        return $result;
    }

    public function getGrade($gradeId)
    {
        $qr = "CALL Grade_GetGrade($gradeId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);

        return $result;
    }
}
