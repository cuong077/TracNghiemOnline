<?php
  class ExamTimeModel extends DB
  {
    public function getExamTime($examTimeId){
        $qr = "SELECT * FROM exam_time WHERE id=$examTimeId";
        $result = mysqli_query($this->con, $qr);

        return $result;
    }

    public function getListExamTime(){
      $qr = "SELECT * FROM exam_time";
      $result = mysqli_query($this->con, $qr);
      
      return $result;
  }
  }

 ?>
