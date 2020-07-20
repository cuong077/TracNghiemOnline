<?php
  class ExamQuestionModel extends DB
  {

  	public function addExamQuestion($exam_id, $question_id)
    {
        $qr = "CALL ExamQuestion_InsertExamQuestion($exam_id, $question_id)";
        mysqli_next_result($this->con);

        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return true;
        }

        return false;
    }

  }
 ?>