<?php

class QuestionModel extends DB{

    //Thêm cau hoi
    public function addQuestion($examId, $content){

    	$qr = "INSERT INTO questions(exam_id, content) VALUES ('$examId', '$content')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
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

	public function getAllQuestionOfExam($examId){

		$qr = "SELECT * FROM questions WHERE exam_id=$examId";
	    $result = mysqli_query($this->con, $qr);

	    return $result;

	}
}




?>
