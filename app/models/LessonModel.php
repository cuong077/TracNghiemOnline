<?php

	class LessonModel extends DB{

		public function getListLessonWithChapterID($chapter_id){

			$qr = "CALL Lesson_GetListLessonWithChapterID($chapter_id)";
			$result = mysqli_query($this->con, $qr);
			mysqli_next_result($this->con);
			if(mysqli_num_rows($result) > 0)
				return $result;
			return null;
			
		}

		public function getLessonBreadcrumb($lesson_id){

			$qr = "CALL Lesson_GetBreadcrumb($lesson_id)";
			$result = mysqli_query($this->con, $qr);
			mysqli_next_result($this->con);
			if(mysqli_num_rows($result) > 0)
				return mysqli_fetch_array($result)['fullname'];
			return null;
			
		}


	}

?>