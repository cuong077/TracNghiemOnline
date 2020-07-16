<?php

	class SubjectModel extends DB{

    //Them mon hoc
    public function addSubject($subjectName, $subjectDescription){
    	$qr = "CALL Subject_InsertSubject('$subjectName', '$subjectDescription')";
		
		mysqli_next_result($this->con);
		$result = mysqli_query($this->con, $qr);
		$id = mysqli_fetch_assoc($result)["SubjectId"];
		
		if($id != null){
			return $id;
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
	public function updateSubject($subjectId, $subjectName, $subjectDescription)
	{
		$qr = "CALL  Subject_updateSubject($subjectId, '$subjectName', '$subjectDescription')";
		
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
		mysqli_next_result($this->con);
		$result = mysqli_query($this->con, $qr);

		return $result;
	}

	public function checkSubjectExistBySubjectName($subjectName, $gradeId){
		$subjectName = trim($subjectName);
		$qr = "CALL Subject_CheckExistsSubjectWithSubjectName('$subjectName', $gradeId)";
		$result = mysqli_query($this->con, $qr);

		if(mysqli_num_rows($result) > 0){
			return true;
		}

		return false;
	}

	public function insertedId(){
		return mysqli_insert_id($this->con);
	}
	
	public function deleteSubject($subjectId){
		$qr = "CALL Subject_DeleteSubject($subjectId)";
		mysqli_next_result($this->con);

		if (mysqli_query($this->con, $qr)) {
			return true;
		}

		return false;
	}
}
?>