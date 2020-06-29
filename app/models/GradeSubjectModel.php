<?php

class GradeSubjectModel extends DB
{
    //Them 
    public function addGradeSubject($gradeId, $subjectId){
        $qr = "CALL GradeSubject_InsertGradeSubject($gradeId, $subjectId)";
        
        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    //get id of grade with id subject
    public function getGradeIdBySubjectId($subjectId){
        $qr = "CALL GradeSubject_GetGradeIdWithSubjectId('$subjectId')";
        // echo $qr;
        $result = mysqli_query($this->con, $qr);
        return $result;
    }

    public function updateGradeId($subjectId, $gradeId){
        $qr = "CALL GradeSubject_UpdateGradeIdBySubjectId($subjectId, $gradeId)";
        
        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function deleteGradeBySubjectId($subjectId){
        $qr = "CALL GradeSubject_DeleteGradeBySubjectId($subjectId)";
        echo $qr;
        mysqli_next_result($this->con);
        // mysqli_query($this->con, $qr);
        if (mysqli_query($this->con, $qr)) {
            return true;
        }

        return false;
    }
}
?>