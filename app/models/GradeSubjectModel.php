<?php

class GradeSubjectModel extends DB
{
    //Them 
    public function addGradeSubject($gradeId, $subjectId){
        $qr = "CALL GradeSubject_InsertGradeSubject($gradeId, $subjectId)";
        // echo $qr;
        mysqli_next_result($this->con);
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

    public function getListSubjectsByGradeId($gradeId){
        $qr = "CALL GradeSubject_GetListSubjectsByGradeId($gradeId)";
        // echo $qr;
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        return $result;
    }


    public function getSubjectsByGradeId($GradeId){
        $qr = "CALL GradeSubject_GetSubjectsWithGradeID($GradeId)";
        // echo $qr;
        $result = mysqli_query($this->con, $qr);

        if(mysqli_num_rows($result) > 0)
            return $result;

        return null;
    }

    public function updateGradeId($subjectId, $gradeId){
        $qr = "CALL GradeSubject_UpdateGradeIdBySubjectId($subjectId, $gradeId)";
        
        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function updateGradeSubjectById($gradeSubjectId, $gradeId, $subjectId){
        $qr = "CALL GradeSubject_updateGradeSubjectById($gradeSubjectId, $gradeId, $subjectId)";
        mysqli_next_result($this->con);

        if(mysqli_query($this->con, $qr)){
            return true;
        }

        return false;
    }

    public function deleteGradeBySubjectId($subjectId){
        $qr = "CALL GradeSubject_DeleteGradeBySubjectId($subjectId)";

        mysqli_next_result($this->con);
        if (mysqli_query($this->con, $qr)) {
            return true;
        }

        return false;
    }

    public function findGradeSubjectIdByGradeIdAndSubjectId($gradeId, $subjectId){
        $qr = "CALL GradeSubject_findGradeSubjectIdByGradeIdAndSubjectId($gradeId, $subjectId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        $gradeSubjectId = mysqli_fetch_assoc($result)["GradeSubjectId"];

        if($gradeSubjectId){
            return $gradeSubjectId;
        }
        return false;
    }

    public function getGradeSubjectById($gradeSubjectId){
        $qr = "CALL GradeSubject_getGradeSubjectById($gradeSubjectId)";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);

        return $result;
    }

    public function getListSubjectFilterByGrade($gradeId){
        $qr = "CALL GradeSubject_getListSubjectFilterByGrade($gradeId)";
        // print_r($qr);

        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);

        return $result;
    }
}
?>