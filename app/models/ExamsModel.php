<?php
  class ExamsModel extends DB
  {
    //Them exam vao database
    public function addExams($description, $userId, $subjectId, $gradeId, $exam_time_id)
    {
      $qr = "INSERT INTO exams(description, user_id, subject_id, grade_id, exam_time_id)
             VALUES ('$description', $userId, $subjectId, $gradeId, $exam_time_id)";

      mysqli_query($this->con, $qr);
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
    public function getExam($examId)
    {
      $qr = "SELECT et.time, e.id, e.description, s.name as subject_name, g.name as grade_name, u.fullname as teacher_name FROM exams e join exam_time et on e.exam_time_id = et.id join subjects s on s.id = e.subject_id join grades g on g.id = e.grade_id join users u on u.id = e.user_id WHERE e.id=$examId ";
      $result = mysqli_query($this->con, $qr);
      return $result;
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
  }

 ?>
