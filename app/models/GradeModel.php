<?php

class GradeModel extends DB
{

    //Them khoi hoc
    public function addGrade($gradeName, $gradeDescription)
    {
        $qr = "CALL Grade_InsertGrade('$gradeName', '$gradeDescription')";

        if (mysqli_query($this->con, $qr)) {
            return true;
        }

        return false;
    }

    //Xoa khoi hoc
    public function deleteGrade($gradeId)
    {

        $qr = "CALL Grade_DeleteGrade()";

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
        if (mysqli_query($this->con, $qr)) {
            return true;
        } 
        
        return false;
    }

    public function hiddenGrade($gradeId){
        $qr = "CALL Grade_HiddenGrade('$gradeId')";
        
        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function getListGrades()
    {
        $qr = "CALL Grade_GetAllGrades()";
        $result = mysqli_query($this->con, $qr);
        
        return $result;
    }

    public function getGrade($gradeId)
    {
        $qr = "CALL Grade_GetGrade('$gradeId')";
        $result = mysqli_query($this->con, $qr);

        return $result;
    }
}
