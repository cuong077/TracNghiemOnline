<?php
class AnswerModel extends DB{

    //Them cau hoi
    public function addAnswer($content, $is_correct, $questionId){
    	$qr = "INSERT INTO answer(content, is_correct, question_id) VALUES ('$content', '$is_correct', '$questionId')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

	//Xoa cau hoi
	public function deleteAnswer($questionId)
	{
		$qr = "DELETE FROM answer WHERE id='$questionId'";

		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getAllAnswerOfQuestion($questionId){

		$qr = "SELECT * FROM answers WHERE question_id=$questionId";
	    $result = mysqli_query($this->con, $qr);

	    return $result;

	}
}
?>
