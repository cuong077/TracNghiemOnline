<?php

	class SubjectModel extends DB{

    //Them mon hoc
    public function addSubject($subjectName){
    	$qr = "INSERT INTO subjects(name) VALUES ('$subjectName')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

		//Xoa khoi hoc
		public function deleteSubject($subjectId)
		{
			$qr = "DELETE FROM subjects WHERE id='$subjectId'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

    //Chinh sua ten khoi hoc
		public function updateGrade($subjectId, $subjectName)
		{
      $qr = "UPDATE subjects SET name='$subjectName',
                              WHERE id='$subjectId'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}
	}

?>
