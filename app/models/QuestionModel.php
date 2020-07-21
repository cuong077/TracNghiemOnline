<?php

class QuestionModel extends DB{

    //Thêm cau hoi
    public function addQuestion($lesson_id, $content, $user_id)
    {
        $qr = "CALL Question_InsertQuestion('$lesson_id', '$content', '$user_id')";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return mysqli_fetch_array($result)["id"];
        }

        return false;
    }


    public function getQuestionWithLessonAndUser($lesson_id, $user_id){
    	
    	$qr = "CALL Question_GetQuestionWithLessonAndUser('$lesson_id', '$user_id')";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return $result;
        }

        return false;
    }

    public function getAllQuestionOfExam($exam_id){

		$qr = "CALL Question_getAllQuestionOfExam('$exam_id')";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return $result;
        }

        return false;
	}



	public function deleteQuestion($questionId)
	{
		$qr = "DELETE FROM questions WHERE id='$questionId'";

		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateQuestion($examId, $content, $questionId)
	{
  		$qr = "UPDATE questions SET exam_id='$examId',
                              content='$content',
                          WHERE id='$questionId'";

		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}

	public function IdQuestion(){
		$qr = "SELECT id FROM `questions` ORDER BY id DESC limit 1";
		$result = mysqli_query($this->con, $qr);
		$row = mysqli_fetch_array($result);
		return $row["id"];
	}

	


}


?>

