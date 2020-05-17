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
	public function updateSubject($subjectId, $subjectName)
	{
		$qr = "UPDATE subjects SET name='$subjectName' WHERE id=$subjectId";
		
		// echo $qr;

		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}
	

	public function getListSubjects(){
		$qr = "SELECT * FROM subjects";
		$result = mysqli_query($this->con, $qr);
		return $result;
	}

	public function getSubject($subjectId){
		$qr = "SELECT * FROM subjects WHERE id=$subjectId";
		$result = mysqli_query($this->con, $qr);
		return $result;
	}
}

?>