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

		public function getListChapters(){
			$qr = "CALL Chapter_GetListChapterToShow()";
			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);
			
			if(mysqli_num_rows($result) > 0){
				return $result;
			}
			return null;
		}

		public function checkExistsChapter($chapterName, $gradeSubjectId){
			$chapterName = trim($chapterName);
			$qr = "CALL Chapter_CheckExistsChapter('$chapterName', $gradeSubjectId)";
			mysqli_next_result($this->con);
			
			// echo $qr;
			$result = mysqli_query($this->con, $qr);
			
			if(mysqli_num_rows($result) > 0){
				return true;
			}

			return false;
		}

		public function addChapter($chapterName, $gradeSubjectId, $chapterDescription){
			$qr = "CALL Chapter_InsertChapter('$chapterName', $gradeSubjectId, '$chapterDescription')";
			mysqli_next_result($this->con);
			echo $qr;

			$result = mysqli_query($this->con, $qr);
			$chapterId = mysqli_fetch_assoc($result)["ChapterId"];

			if($chapterId){
				return $chapterId;
			} 

			return false;
		}

		public function getChapterById($chapterId){
			$qr = "CALL Chapter_GetChapterById($chapterId)";
			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);

			return $result;
		}

		public function checkExistChapterByName($chapterName, $gradeId, $subjectId){
			$qr = "CALL Chapter_checkExistChapterByName('$chapterName', $gradeId, $subjectId)";

			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);

			if(mysqli_num_rows($result) > 0){
				return true;
			}
			
			return false;
		}

		public function hiddenChapter($chapterId){
			$qr = "CALL Chapter_hiddenChapter($chapterId)";
			mysqli_next_result($this->con);
			
			if(mysqli_query($this->con, $qr)){
				return true;
			}

			return false;
		}

		public function updateChapter($chapterName, $chapterDescription, $chapterId){
			$qr = "CALL Chapter_updateChapter($chapterId, '$chapterName', '$chapterDescription')";
			mysqli_next_result($this->con);
			$result = mysqli_query($this->con, $qr);
			
			$id = mysqli_fetch_assoc($result)["ChapterId"];
			$last_id = mysqli_insert_id($this->con);

			if($id){
				return $id;
			}

			return false;
		}
	}

?>