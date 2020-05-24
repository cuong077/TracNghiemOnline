<?php

	class QuestionModel extends DB{

    //Thêm cau hoi
    public function addQuestion($content){

    	$qr = "INSERT INTO questions(content) VALUES ('$content')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

		//Xoa cau hoi
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

    //Xoa cau hoi
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