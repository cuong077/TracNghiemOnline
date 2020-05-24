<?php
  class UserAnswerModel extends DB
  {
    //Them exam vao database
    public function addUserAnswer($question_id, $user_id, $answer_id, $exam_result_id)
    {
      $qr = "INSERT INTO user_answers( question_id, user_id, answer_id, exam_result_id)
             VALUES ($question_id, $user_id, $answer_id, $exam_result_id)";

      if (mysqli_query($this->con, $qr)) {
        return mysqli_insert_id($this->con);
      }

      return false;
    }

    //lay 1 exam trong database
    public function getAnswerOfUser($exam_result_id, $user_id, $question_id)
    {
      $qr = "SELECT * FROM user_answers WHERE exam_result_id=$exam_result_id and user_id = $user_id and question_id = $question_id  LIMIT 1";
      $result = mysqli_query($this->con, $qr);

      return $result;
    }


    public function updateAnswer($exam_result_id, $question_id, $answer_id){
      $qr = "UPDATE user_answers set answer_id = $answer_id where exam_result_id = $exam_result_id and question_id = $question_id";

      if(mysqli_query($this->con, $qr)){
        return true;
      }

      return false;
    }

  }

 ?>
