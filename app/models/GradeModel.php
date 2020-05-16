<?php

	class GradesModel extends DB{

		//lay danh sach khoi lop hoc
		public function getGrades()
		{
			$qr = "SELECT id, name FROM grades";
			$result = mysqli_query($this->con, $qr);

			return $result;
		}

		//Kiem tra mon hoc ton tai voi ten
		public function existGradeWithName($gradeName){
			$qr = "SELECT * FROM grades WHERE name='$gradeName' LIMIT 1";

			if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
				return true;
			}

			return false;
		}

		//Kiem tra mon hoc ton tai voi id
		public function existGradeWithId($grandId){
			$qr = "SELECT * FROM grades WHERE id='$grandId' LIMIT 1";

			if(mysqli_num_rows(mysqli_query($this->con, $qr)) > 0){
				return true;
			}

			return false;
		}

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
		public function updateGrade($grandId, $gradeName)
		{
      $qr = "UPDATE questions SET name='$gradeName',
                              WHERE id='$grandId'";

			if (mysqli_query($this->con, $qr)) {
				return true;
			}
			else{
				return false;
			}
		}
	}

?>
