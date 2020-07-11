<?php

	class SubjectModel extends DB{

    //Them mon hoc
    public function addSubject($subjectName, $subjectDescription){
    	$qr = "CALL Subject_InsertSubject('$subjectName', '$subjectDescription')";
		
		mysqli_next_result($this->con);
		
		if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

		//Xoa khoi hoc
	public function hiddenSubject($subjectId)
	{
		$qr = "CALL Subject_HiddenSubjectById('$subjectId')";
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
		$qr = "UPDATE subject SET Name='$subjectName' WHERE SubjectId=$subjectId";
		
		// echo $qr;
		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getListSubjects(){
		$qr = "CALL Subject_GetListSubjects()";
		$result = mysqli_query($this->con, $qr);

		return $result;
	}

	public function getSubject($subjectId){
		$qr = "CALL Subject_GetSubject($subjectId)";
		$result = mysqli_query($this->con, $qr);

		return $result;
	}

	public function insertedId(){
        return mysqli_insert_id($this->con);
	}
	
	public function deleteSubject($subjectId){
		$qr = "CALL Subject_DeleteSubject($subjectId)";
		// echo $qr;
		mysqli_next_result($this->con);

		if (mysqli_query($this->con, $qr)) {
			return true;
		}

		return false;
	}
}
?>