<?php
	class AnswerModel extends DB{

    //Them cau hoi
    public function addAnswer($content, $is_correct = 1, $questionId){
    	$qr = "INSERT INTO answers(content, is_correct, question_id) VALUES ('$content', $is_correct, $questionId)";
		//echo $qr;

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
	}
?>
