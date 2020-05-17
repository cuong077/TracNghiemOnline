<?php
  class ExamTimeModel extends DB
  {
    public function getExamTime($examTimeId){
        $qr = "SELECT * FROM exam_time";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
  }

 ?>
