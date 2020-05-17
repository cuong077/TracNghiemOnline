<?php
  class ExamResultsModel extends DB
  {
    //Them exam vao database
    public function addExamResult($user_id, $exam_id, $time_join, $is_completed=2)
    {
      $qr = "INSERT INTO exam_results( user_id, exam_id, time_join, is_completed)
             VALUES ($user_id, $exam_id, '$time_join', $is_completed)";

      if (mysqli_query($this->con, $qr)) {
        return mysqli_insert_id($this->con);
      }

      return false;
    }


    //
    public function updateStatusExamResult($exam_result_id, $status){

      $qr = "UPDATE exam_results set is_completed = $status where id = $exam_result_id";
      if (mysqli_query($this->con, $qr) > 0){
        return true;
      }else{
        return false;
      }

    }

    //lay n exams trong database
    public function checkExistExamResultOfUser($user_id, $exam_id){

      $qr = "select * from exam_results where user_id = $user_id and exam_id = $exam_id order by id desc limit 1";
      $result = mysqli_query($this->con, $qr);

      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        return $row["id"];
      }else{
        return null;
      }
    }


    public function getTimePassed($exam_result_id, $time_current){

      $qr = "select * from exam_results where id = $exam_result_id";
      $result = mysqli_query($this->con, $qr);

      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        $time_join_parsed = strtotime($row["time_join"]);

        $time_current_parsed = strtotime($time_current);

        return $time_current_parsed - $time_join_parsed;
        //đơn vị (s)

      }else{
        return null;
      }

    }

    public function checkExamResultIsCompleted($exam_result_id){

      $qr = "select * from exam_results where id = $exam_result_id";
      $result = mysqli_query($this->con, $qr);

      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $is_completed = (int)$row["is_completed"];

        if($is_completed == 2)
          return false;
        else
          return true;
      }else{
        return false;
      }
    }

    //lay 1 exam trong database
    public function getExamResult($exam_result_id)
    {
      $qr = "SELECT * FROM exam_results WHERE id=$exam_result_id LIMIT 1";
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

    public function updateExam($description, $time_start, $time_end, $userId, $subjectId, $gradeId, $exam_time_id, $examId)
    {
      // code...
      $qr = "UPDATE exams SET description='$description',
                              time_start='$time_start',
                              time_end='$time_end',
                              user_id='$userId',
                              subject_id='$subjectId',
                              grade_id='$gradeId',
                              exam_time_id='$exam_time_id')
                          WHERE id='$examId'";

      if (mysqli_num_rows(mysqli_query($this->con, $qr)) > 0) {
        return true;
      }
      else {
        return false;
      }
    }
  }

 ?>
