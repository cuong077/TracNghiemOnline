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
		      "exam_time_name"		=> $exam_time_name
		      
		    ]);
	    }
	}


	//Create questions

	public function createQuestion(){

		//load model
		$grades_model = $this->model("GradeModel");
		$subjects_model = $this->model("SubjectModel");


		if(isset($_POST['complete_add'])){

			print_r($_POST);

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


	//create class
	public function CreateClass(){
		$grades_model = $this->model("GradeModel");
		$exam_time_model = $this->model("ExamTimeModel");
		$subjects_model = $this->model("SubjectModel");

		$error = [];

		if(isset($_POST["addClass"])){

			$gradeId = $_POST["gradeId"];
			$className = $_POST["ClassName"];
			$password = $_POST["PasswordJoinClass"];
			$classDescription = $_POST["ClassDescription"];

			if(!isset($gradeId)  || $gradeId==""){
				$error["grade"] = "Vui lòng chọn khối lớp.";
			}

			if(!isset($className)  || $className==""){
				$error["className"] = "Vui lòng nhập tên lớp.";
			}
			else{
				//check class name exists
				$classModel = $this->model("ClassModel");
				$classResult = $classModel->checkExistsClassByName($className, $gradeId);

				if($classResult == true){
					$error["className"] = "Lớp học đã tồn tại.";
				}
			}
			if(!isset($password)  || $password==""){
				$error["password"] = "Vui lòng nhập mật khẩu.";
			}
			if(!isset($classDescription)  || $classDescription==""){
				$error["description"] = "Vui lòng nhập mô tả lớp học.";
			}

			//add to db
			if($error == []){
				$userId = $this->getUserId();
				$classModel = $this->model("ClassModel");
				$classResult = $classModel->addClass($className, $classDescription, $password, $userId, $gradeId);
				var_dump($className, $classDescription, $password, $userId, $gradeId);
				$this->showScript('Thêm thành công.');
				// $this->ListClasses();
				$this->redirect("Teacher/ListClasses");
			}
		}

		$this->view("simple2", [
	      "Page"        => "simple2_createClass",
	      "title"       => "Tạo lớp học",
	      "grades"		=> $grades_model->getListGrades(),
		  "menu"		=> "simple2_teacher_menu",
		  "error"		=> $error
	    ]);
	}

	public function ListClasses(){
		$this->view("simple2", [
			"Page"        => "simple2_listClasses",
			"title"       => "Danh sách lớp học",
			// "grades"		=> $grades_model->getListGrades(),
			"menu"		=> "simple2_teacher_menu",
			"error"		=> $error
		  ]);
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


?>