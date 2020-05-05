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
