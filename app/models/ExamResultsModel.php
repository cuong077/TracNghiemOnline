<?php
  class ExamResultsModel extends DB
  {

    public function getExamResultWithID($exam_id, $user_id){

      $qr = "CALL Result_GetResultByExamIDAndUserID($exam_id, $user_id)";
      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);

      if ($result){

          return $result;

      }

      return false;

    }

    public function getListScore($examId){
      $qr = "CALL Result_getListScore($examId)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }
    
    public function getAvgScore($examId){
      $qr = "CALL Result_getAvgScore($examId)";
      mysqli_next_result($this->con);
      $result =  mysqli_query($this->con, $qr);
      $fetch = mysqli_fetch_assoc($result);
      
      return $fetch["avg"];
    }

    public function getPerUpperavgScore($avgScore, $examId){
      $qr = "CALL Result_getPerUpperavgScore($avgScore, $examId)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }

    public function getUpperAvgOfExam($avgScore, $examId){
      $qr = "CALL Result_getUpperAvgOfExam($avgScore, $examId)";
      // echo $qr;
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }

    public function getTotalUserOfExam($examId){
      $qr = "CALL Result_getTotalUserOfExam($examId)";
      mysqli_next_result($this->con);
      $result = mysqli_query($this->con, $qr);

      return $result;
    }

    public function getExamResult($result_id){

      $qr = "CALL Result_getResult($result_id)";
      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);

      if ($result){

          return $result;

      }

      return false;
    }

    public function addExamResult($time_join, $user_id, $exam_id, $is_completed)
    {
      $qr = "CALL Result_InsertResult('$time_join', $user_id, $exam_id, $is_completed)";


      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);
      
      if ($result) {
          return mysqli_fetch_array($result)["ResultId"];
      }

      return false;
    }



    //
    public function updateStatusExamResult($result_id, $status){

      $qr = "CALL Result_updateStatusResult($result_id, $status)";
      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);

      if ($result){

          return true;

      }

      return false;

    }

    public function updateScoreExamResult($result_id, $score){

      $qr = "CALL Result_updateResultScore($result_id, $score)";
      mysqli_next_result($this->con);
      
      $result = mysqli_query($this->con, $qr);

      if ($result){

          return true;

      }

      return false;

    }

    


    public function getResultWithUserId($user_id){

      $qr = "CALL Result_getResultByUserId($user_id)";
      mysqli_next_result($this->con);

      $result = mysqli_query($this->con, $qr);

      if ($result){

          return $result;

      }

      return false;

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



    public function getAllExamResultOfUser($user_id)
    {
      $qr = "SELECT er.id, er.is_completed, er.time_join, e.description, g.name as grade_name, s.name as subject_name FROM exam_results er join exams e on er.exam_id = e.id join subjects s on e.subject_id = s.id join grades g on g.id = e.grade_id  WHERE er.user_id=$user_id order by er.id desc";
      $result = mysqli_query($this->con, $qr);
      return $result;
    }

    public function checkUserDoingExam($user_id){
      $qr = "SELECT * FROM exam_results WHERE user_id=$user_id and is_completed = 2 LIMIT 1";
     
      $result = mysqli_query($this->con, $qr);


      if(mysqli_num_rows($result) > 0)
        return true;
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
