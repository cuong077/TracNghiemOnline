<?php
  class UserAnswerModel extends DB
  {
    //Them exam vao database
    public function addUserAnswer($result_id, $question_id, $answer_id)
    {
      $qr = "CALL UserAnswerQuestion_addUserAnswerQuestion($result_id, $question_id, $answer_id)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      if ($result) {
          return true;
      }

      return false;
    }

    //lay 1 exam trong database
    public function getAnswerOfUser($result_id, $question_id)
    {
      $qr = "CALL UserAnswerQuestion_getUserAnswerQuestion('$result_id', '$question_id')";
        mysqli_next_result($this->con);

        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return $result;
        }

        return false;
    }


    public function updateAnswer($result_id, $question_id, $answer_id){
      $qr = "CALL UserAnswerQuestion_UpdateAnswer('$result_id', '$question_id', '$answer_id')";
        mysqli_next_result($this->con);
        echo $qr;
        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return true;
        }

        return false;
    }

  }

 ?>
