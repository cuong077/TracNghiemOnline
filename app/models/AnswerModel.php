<?php
class AnswerModel extends DB{

    //Them cau hoi
    public function addAnswer($content, $is_correct = 1, $question_id)
    {
        $qr = "CALL Answer_InsertAnswer('$content', '$is_correct', '$question_id')";
        mysqli_next_result($this->con);
        if (mysqli_query($this->con, $qr)) {
            return true;
        }

        return false;
    }

    public function getAllAnswerOfQuestion($question_id){
    	
    	$qr = "CALL Answer_GetAllAnswerOfQuestion('$question_id')";
        mysqli_next_result($this->con);
        $result = mysqli_query($this->con, $qr);
        if ($result) {
            return $result;
        }

        return false;
    }


	//Xoa cau hoi
	public function deleteAnswer($questionId)
	{
		$qr = "DELETE FROM answer WHERE id='$questionId'";
        mysqli_next_result($this->con);

		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}

}
?>
