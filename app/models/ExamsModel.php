<?php

  /**
   *
   */
  class ExamsModel extends DB
  {
    public function checkExistedExam($examId)
    {
      $qr = "SELECT * FROM exams WHERE id='$examId' LIMIT 1";
      if (mysqli_num_rows(mysqli_query($this->con, $qr)) > 0) {
        return true;
      }

      return false;
    }

    public function addExams( )
    {
      // code...
    }

  }


 ?>
