<?php

	class GradesModel extends DB{

    //Them khoi hoc
    public function addGrade($gradeName){
    	$qr = "INSERT INTO grades(name) VALUES ('$gradeName')";

    	if(mysqli_query($this->con, $qr)){
    		return true;
    	}

    	return false;
    }

		//Xoa khoi hoc
		public function deleteGrade($grandId)
		{
			$qr = "DELETE FROM grades WHERE id='$grandId'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}

    //Chinh sua ten khoi hoc
	public function updateGrade($gradeId, $gradeName)
	{
		$qr = "UPDATE grades SET name='$gradeName'
								WHERE id=$gradeId";
		// echo $qr;
		if (mysqli_query($this->con, $qr)) {
			return true;
		}
		else{
			return false;
		}
		
	}

	public function getListGrades(){
		$qr = "SELECT * FROM grades";
		$result = mysqli_query($this->con, $qr);

		return $result;
	}

	public function getGrade($gradeId){
		$qr = "SELECT * FROM grades WHERE id=$gradeId LIMIT 1";
		$result = mysqli_query($this->con, $qr);

		return $result;
	}
}

?>