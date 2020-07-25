<?php
  class ExamsModel extends DB
  {
    //Them exam vao database
    public function addExam($exam_name, $exam_description, $exam_created_date, $exam_amount_of_question, $exam_time_start, $user_id, $exam_type_id, $exam_time_id, $class_id)
    {
      $qr = "CALL Exam_InsertExam('$exam_name', '$exam_description', '$exam_created_date', $exam_amount_of_question, '$exam_time_start', $user_id, $exam_type_id, $exam_time_id, $class_id)";


      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);
      
      if ($result) {
          return mysqli_fetch_array($result)["ExamId"];
      }

      return false;
    }

    public function getListExamsByClassIdWith($classId){
      $qr = "CALL Exam_getListExamsByClassIdWith($classId)";
      // echo $qr;
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }

    public function getListExamsByClassIdWithExamType($classId){
      $qr = "CALL Class_getListExamsByClassIdWithExamType($classId)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);
      
      return $result;
    }

    //lay n exams trong database
    public function getListExams()
    {
      $qr = "SELECT * FROM exams";
      // echo $qr;
      $result = mysqli_query($this->con, $qr);

      return $result;
    }

    //lay 1 exam trong database
    public function getExam($exam_id)
    {

      $qr = "CALL Exam_getExam($exam_id)";
      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);

      if ($result){

          return $result;

      }

      return false;

    }

    //xoa exam trong database voi id
    public function deleteExam($examId)
    {
      $qr = "DELETE FROM exams WHERE id='$examId'";

      if (mysqli_query($this->con, $qr)) {
        return true;
      }
      else{
        return false;
      }
    }

    public function updateExam($description, $subjectId, $gradeId, $exam_time_id, $examId)
    {
      // code...
      $qr = "UPDATE exams SET 
                              description='$description',
                              subject_id=$subjectId,
                              grade_id=$gradeId,
                              exam_time_id=$exam_time_id)
                          WHERE id=$examId";

      if (mysqli_num_rows(mysqli_query($this->con, $qr)) > 0) {
        return true;
      }
      else {
        return false;
      }
    }

    public function getListExamsByClassIdWithoutSetClass(){
      $qr = "CALL Exam_getListExamsByClassIdWithoutSetClass()";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);
      return $result;
    }

    public function getListExamsByClassIdWithExamTypeWithoutSetClass(){
      $qr = "CALL Exam_getListExamsByClassIdWithExamTypeWithoutSetClass()";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);
      
      return $result;
    }
    public function setToClass($examId, $classId){
      $qr = "CALL Exam_setToClass($examId, $classId)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }
  }

 ?>
