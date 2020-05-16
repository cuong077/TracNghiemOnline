<?php

	class SubjectModel extends DB{

		//Lay 1 mon
		public function getSubjects(){
			$qr = "SELECT id, name FROM subjects";
			$result = mysqli_query($this->con, $qr);
			
			return $result;
		}

		//Kiem tra mon hoc ton tai voi ten
		public function existSubjectWithName($subjectName){
    	$qr = "SELECT * FROM subjects WHERE name='$subjectName' LIMIT 1";

    	if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
    		return true;
    	}

    	return false;
    }

		//Kiem tra mon hoc ton tai voi id
		public function existSubjectWithId($subjectId){
    	$qr = "SELECT * FROM subjects WHERE id='$subjectId' LIMIT 1";

    	if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
    		return true;
    	}

    	return false;
    }

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
		public function updateSubject($subjectId, $subjectName)
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
