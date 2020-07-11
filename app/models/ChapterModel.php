<?php

	class ChapterModel extends DB{

		public function getListChapterWithGradeSubject($grade_id, $subject_id){

			$qr = "CALL Chapter_GetListChapterWithGradeSubjectID($grade_id, $subject_id)";
			
			$result = mysqli_query($this->con, $qr);
			mysqli_next_result($this->con);
			if(mysqli_num_rows($result) > 0)
				return $result;
			return null;

		}


	}

?>