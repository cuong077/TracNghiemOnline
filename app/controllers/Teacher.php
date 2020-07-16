<?php
class Teacher extends Controller{
    

    public function __construct(){

    	if(!$this->is_Teacher()){
    		$this->redirect("Home");
    		exit;
    	}

    }

	public function index(){

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_index",
	      "title"       => "Quản trị của giáo viên",
	      "menu"		=> "simple2_teacher_menu"
	    ]);
	}


	//Create exam

	public function createExamSelection(){

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_exam_selection",
	      "title"       => "Tạo đề thi",
	      "menu"		=> "simple2_teacher_menu"
	    ]);
	}

	public function createExamManualStep1(){


		//load model
		$grades_model = $this->model("GradeModel");
		$exam_time_model = $this->model("ExamTimeModel");
		$subjects_model = $this->model("SubjectModel");


		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_exam_manual_step1",
	      "title"       => "Tạo đề thi",
	      "grades"		=> $grades_model->getListGrades(),
	      "exam_times"	=> $exam_time_model->getListExamTime(),
	      "subjects"	=> $subjects_model->getListSubjects()
	    ]);
	}

	public function createExamManualStep2(){

		
	    if(isset($_POST['step1'])){


	    	$grade_id = $this->clear($_POST['gradeId']);
	    	$subject_id = $this->clear($_POST['subjectId']);
	    	$exam_name = $this->clear($_POST['exam_name']);
	    	$exam_num_of_question = $this->clear($_POST['examNumOfQuestion']);
	    	$exam_time = $this->clear($_POST['durationOfTime']);

	    	$grade_name = $this->clear($_POST['grade_name']);
	    	$subject_name = $this->clear($_POST['subject_name']);
	    	$exam_time_name = $this->clear($_POST['exam_time_name']);



	    	//load model 
	    	$chapter_model = $this->model("ChapterModel");
	    	$lesson_model = $this->model("LessonModel");


	    	$chapter_result = $chapter_model->getListChapterWithGradeSubject($grade_id, $subject_id);


	    	$chapters_and_lessons = [];


	    	if($chapter_result != null)
		    	while ($chapter = mysqli_fetch_array($chapter_result)) {
		    		
		    		$_chapter = new Chapter();
		    		$_chapter->chapter_id = $chapter["ChapterId"];
		    		$_chapter->chapter_name = $chapter["Name"];
		    		$_chapter->chapter_description = $chapter["Description"];

		    		$lesson_result = $lesson_model->getListLessonWithChapterID($_chapter->chapter_id);

		    		while ($lesson = mysqli_fetch_array($lesson_result)){

		    			$_lesson = new Lesson();
		    			$_lesson->lesson_id = $lesson["LessonId"];
		    			$_lesson->lesson_name = $lesson["Name"];
		    			$_lesson->lesson_description = $lesson["Description"];

		    			$_chapter->list_lesson[] = $_lesson;
		    		}

		    		mysqli_free_result($lesson_result);

		    		$chapters_and_lessons[] = $_chapter;

		    	}


	    	$this->view("simple2", [
		      "Page"        => "simple2_teacher_create_exam_manual_step2",
		      "title"       => "Tạo đề thi",
		      "chapters_and_lessons" => $chapters_and_lessons,
		      "grade_name"			=> $grade_name,
		      "subject_name"		=> $subject_name,
		      "exam_time_name"		=> $exam_time_name,
		      "number_of_questions"	=> $exam_num_of_question
		      
		    ]);
	    
	    }else{
	    	$this->redirect("Teacher/createExamManualStep1");
    		exit;
	    }
	}


	//Create questions

	public function createQuestion(){

		//load model
		$grades_model = $this->model("GradeModel");
		$subjects_model = $this->model("SubjectModel");


		//list lưu tất cả lỗi trong quá trình kiểm tra
		$errors = [];


		//set ban đầu để xem list câu hỏi giáo viên truyền vào có vấn đề gì ko(mặc định là không)
		//$errors["list_questions"] = false;

		if(isset($_POST['complete_add'])){


			//input post
			$grade_id = $this->clear($_POST['grade_id']);
			$subject_id = $this->clear($_POST['subjectId']);
			$chapter_id = $this->clear($_POST['chapterId']);
			$lesson_id = $this->clear($_POST['lessonId']);


			if($grade_id == "" || $grade_id == null)
				$errors["grade"] = "Khối không được để trống.";

			if($subject_id == "" || $subject_id == null)
				$errors["subject"] = "Môn học không được để trống.";

			if($chapter_id == "" || $chapter_id == null)
				$errors["chapter"] = "Chương không được để trống.";

			if($lesson_id == "" || $lesson_id == null)
				$errors["lesson"] = "Bài học không được để trống.";

			//** bổ sung thêm check tồn tại bài học **

			$number_of_questions = (int)$this->clear($_POST['number_of_questions']);

			if($number_of_questions == "" || $number_of_questions == null || $number_of_questions <= 0)
				$errors["number_of_questions"] = "Ít nhất phải thêm 1 câu hỏi.";


			// khởi tạo 1 list chưa tất cà câu hỏi và câu trả lời người dùng nhập vào
			$list_question = [];





			//vòng lặp lặp qua tất cả câu hỏi người dùng truyền vào để kiểm tra
			for($i = 1; $i <= $number_of_questions; $i++){

				if(isset($_POST['question_'.$i])){

					$question = new Question();

					$question->content = $this->clear($_POST['question_'.$i]);
					$question->is_error = false;

					$answer_pos_correct = -1;


					if($question->content == "" || $question->content == null){
						$question->is_error = true;
						$errors["list_questions"] = true;
					}

					if(isset($_POST['check_question_'.$i])){

						$answer_pos_correct = (int)$this->clear($_POST['check_question_'.$i]);

						if(1 <= $answer_pos_correct && $answer_pos_correct <= 4)
							$question->is_have_answer_choose = true;
							

					}else{
						$question->is_have_answer_choose = false;
						$errors["list_questions"] = true;
					}

					

					for($j = 1; $j <= 4; $j++){

						$answer = new Answer();

						if(isset($_POST['question_'.$i.'_answer_'.$j])){
							$answer->is_error = false;
							$answer->content = $_POST['question_'.$i.'_answer_'.$j];

							if($_POST['question_'.$i.'_answer_'.$j] == "")
								$answer->is_error = true;

							if($answer_pos_correct == $j)
								$answer->is_correct = true;

						}else{
							$errors["list_questions"] = true;
						}

						$question->list_answer[] = $answer;

					}

					$list_question[] = $question;

				}else{
					$errors["list_questions"] = true;
				}
			}




			if(count($list_question) <= 0)
				$errors["number_of_questions"] = "Ít nhất phải thêm 1 câu hỏi.";

			/*

			echo "<pre>";
			print_r($errors);
			echo "</pre>";

			*/

			if(count($errors) > 0){

				$this->view("simple2", [
			      "Page"        => "simple2_teacher_create_question",
			      "title"       => "Tạo câu hỏi",
			      "menu"		=> "simple2_teacher_menu",
			      "grades"		=> $grades_model->getListGrades(),
			      "subjects"	=> $subjects_model->getListSubjects(),
			      "errors"		=> $errors,
			      "back_list_questions"	=> $list_question,
			      "back_grade_id"	=> $grade_id,
			      "back_subject_id"	=> $subject_id,
			      "back_chapter_id"	=> $chapter_id,
			      "back_lesson_id"	=> $lesson_id,
			      "back_number_of_questions" => $number_of_questions
			    ]);

			    exit;

			}else{

				$question_model = $this->model("QuestionModel");
				$answer_model = $this->model("AnswerModel");

				$user_id = $this->getUserId();

				foreach ($list_question as $key => $question) {
					
					$question_id = $question_model->addQuestion($lesson_id, base64_encode($question->content), $user_id);

					foreach ($question->list_answer as $answer) {
						$answer_model->addAnswer(base64_encode($answer->content), $answer->is_correct, $question_id);
					}

				}

				$this->view("simple2", [
			      "Page"        => "simple2_teacher_create_question",
			      "title"       => "Tạo câu hỏi",
			      "menu"		=> "simple2_teacher_menu",
			      "grades"		=> $grades_model->getListGrades(),
			      "subjects"	=> $subjects_model->getListSubjects(),
			      "success"		=> "Tạo thành công các câu hỏi. Vui lòng kiểm tra trong phần tạo đề."
			    ]);

			    exit;

			}




		}

		$this->view("simple2", [
	      "Page"        => "simple2_teacher_create_question",
	      "title"       => "Tạo câu hỏi",
	      "menu"		=> "simple2_teacher_menu",
	      "grades"		=> $grades_model->getListGrades(),
	      "subjects"	=> $subjects_model->getListSubjects()
	    ]);
	}



	//API

	public function getSubjectsOfGrade($grade_id){


		$grade_id = $this->clear($grade_id);


		//load model
		$grade_subject_model = $this->model("GradeSubjectModel");

		$result = $grade_subject_model->getSubjectsByGradeId($grade_id);


		$data = [];

		if($result != null){

			while ($row = mysqli_fetch_array($result)) {
				$grade_subject = new GradeSubject();

				$grade_subject->grade_id = $row["grade_id"];
				$grade_subject->subject_id = $row["subject_id"];
				$grade_subject->subject_name = $row["subject_name"];

				$data[] = $grade_subject;
			}

		}

		echo json_encode($data);

		exit;
	}

	public function getChapterOfSubjectGrade($grade_id, $subject_id){

		
		$grade_id = $this->clear($grade_id);
		$subject_id = $this->clear($subject_id);

		//load model
		$chapter_model = $this->model("ChapterModel");


		$chapter_result = $chapter_model->getListChapterWithGradeSubject($grade_id, $subject_id);

		$data = [];

		if($chapter_result != null){

			while ($_chapter = mysqli_fetch_array($chapter_result)) {
				$chapter = new Chapter();

				$chapter->chapter_id = $_chapter["ChapterId"];
				$chapter->chapter_name = $_chapter["Name"];
				$chapter->chapter_description = $_chapter["Description"];

				$data[] = $chapter;
			}

		}

		echo json_encode($data);

		exit;
	}

	public function getLessonOfChapter($chapter_id){


		$chapter_id = $this->clear($chapter_id);


		//load model
		$lesson_model = $this->model("LessonModel");

		$data = [];

		$lesson_result = $lesson_model->getListLessonWithChapterID($chapter_id);

		if($lesson_result != null){

			while ($lesson = mysqli_fetch_array($lesson_result)){

				$_lesson = new Lesson();
				$_lesson->lesson_id = $lesson["LessonId"];
				$_lesson->lesson_name = $lesson["Name"];
				$_lesson->lesson_description = $lesson["Description"];

				$data[] = $_lesson;
			}

		}

		echo json_encode($data);

		exit;
	}

	public function getListQuestion(){

		//load model
		$question_model = $this->model("QuestionModel");
		$answer_model = $this->model("AnswerModel");
		$lesson_model = $this->model("LessonModel");

		$json = file_get_contents('php://input');

		$data = json_decode($json);

		$user_id = $this->getUserId();

		$list_question = [];

		foreach ($data->list_lesson as $lesson_id) {
			
			$question_results = $question_model->getQuestionWithLessonAndUser($lesson_id, $user_id);
			$breadcrum = $lesson_model->getLessonBreadcrumb($lesson_id); 

			while ($_question = mysqli_fetch_array($question_results)) {
				
				$question = new Question();
				$question->question_id = $_question["QuestionId"];
				$question->content = base64_decode($_question["Content"]);
				$question->breadcrum = $breadcrum;

				$answer_results = $answer_model->getAllAnswerOfQuestion($question->question_id);

				while ($_answer = mysqli_fetch_array($answer_results)) {
					
					$answer = new Answer();
					$answer->content = base64_decode($_answer["Content"]);
					$answer->is_correct = $_answer["Is_correct"];

					$question->list_answer[] = $answer;
				}


				$list_question[] = $question;
			}

		}

		
		echo json_encode($list_question);
	}

}


class GradeSubject{

	public $grade_id;

	public $subject_id;

	public $subject_name;
}

class Chapter{

	public $chapter_id;

	public $chapter_name;

	public $chapter_description;

	public $list_lesson = [];
}

class Lesson{

	public $lesson_id;

	public $lesson_name;

	public $lesson_description;

	
}

class Question{

	public $question_id;

	public $content;

	public $list_answer = [];

	public $is_error = true;

	public $is_have_answer_choose = false;

	public $breadcrum;

}

class Answer{

	public $content;

	public $is_correct = false;

	public $is_error = true;

}

?>