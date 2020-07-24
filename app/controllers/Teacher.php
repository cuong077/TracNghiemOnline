<?php
// Report simple running errors

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
	    	$exam_datetime_start = $this->clear($_POST['datetimeStart']);

	    	if($grade_id == "" || $subject_id == "" || $exam_name == "" || $exam_num_of_question == "" || $exam_time == "" || $exam_datetime_start == ""){

	    		$this->redirect("Teacher/createExamManualStep1");
    			exit;

	    	}

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
		      "number_of_questions"	=> $exam_num_of_question,
		      "exam_name"			=> $exam_name,
		      "exam_datetime_start"	=> $exam_datetime_start,
		      "exam_time_id"		=> $exam_time
		      
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

							if($_POST['question_'.$i.'_answer_'.$j] == ""){
								$answer->is_error = true;
								$errors["list_questions"] = true;
							}

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

  	public function createExam(){


  		$json = file_get_contents('php://input');

		$data = json_decode($json);

		$user_id = $this->getUserId();


		//load model
		$exam_question_model = $this->model("ExamQuestionModel");
		$exam_model = $this->model("ExamsModel");

		$exam_time_start_reformat = new DateTime($data->exam_time_start);
  		$exam_time_start_reformat = $exam_time_start_reformat->format('Y-m-d H:i:s');

		$exam_id = $exam_model->addExam($data->exam_name, $data->exam_description, date('Y-m-d H:i:s'), $data->exam_amount_of_question,$exam_time_start_reformat , $user_id, 1, $data->exam_time_id, 'null');

		foreach ($data->list_question_id as $question_id) {
			$exam_question_model->addExamQuestion($exam_id, $question_id);
		}

		if($exam_id != false)
			echo '{"status" : "success", "message" : "Thành công"}';
		else
			echo '{"status" : "fail", "message" : "Thất bại"}';
  	}

  	public function test(){
  		$date = new DateTime("2020-07-17T23:42");
  		echo $date->format('Y-m-d H:i:s');
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
				// var_dump($className, $classDescription, $password, $userId, $gradeId);
				$this->showScript('Thêm thành công.');
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
		$classModel = $this->model("ClassModel");
		$userClassModel = $this->model("UserClassModel");

		$userId = $this->getUserId();
		$classResult = $classModel->getListClasses($userId);
		$classes = [];

		while ($row = mysqli_fetch_assoc($classResult)) {
			$classId = (int)$row["ClassId"];
			$total = $userClassModel->getTotalUserJoinedClass($classId);
			$row["total"] = $total;
			array_push($classes, $row);
		}

		$gradeModel = $this->model("GradeModel");
		$gradeResult = $gradeModel->getListGrades();
		$grades = [];

		while ($row = mysqli_fetch_assoc($gradeResult)) {
			array_push($grades, $row);
		}

		//print_r($classes);

		$this->view("simple2", [
			"Page"        	=> "simple2_listClasses",
			"title"       	=> "Danh sách lớp học",
			"classes"		=> $classes,
			"grades"		=> $grades,
			"menu"			=> "simple2_teacher_menu",
			"totalUserJoinedClass"           => $total 
		  ]);
	}

	public function EditClass($classId){
		$classModel = $this->model("ClassModel");
		$classResult = $classModel->getClassById($classId);
		$class = mysqli_fetch_assoc($classResult);
		$gradeModel = $this->model("GradeModel");
		$gradeResult = $gradeModel->getGrade((int)$class["GradeId"]);
		$grade = mysqli_fetch_assoc($gradeResult);
		$error = [];
		$oldClassName = $class["Name"];

		if(isset($_POST["updateClass"])){

			$gradeId = (int)$class["GradeId"];
			// echo $gradeId;
			$className = $_POST["ClassName"];
			$password = $_POST["PasswordJoinClass"];
			$classDescription = $_POST["ClassDescription"];

			if(!isset($className)  || $className==""){
				$error["className"] = "Vui lòng nhập tên lớp.";
			}
			else{
				//check class name exists
				if ($oldClassName != $className) {
					$classModel = $this->model("ClassModel");
					$classResult = $classModel->checkExistsClassByName($className, $gradeId);

					if($classResult == true){
						$error["className"] = "Lớp học đã tồn tại.";
					}
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
				// $classModel = $this->model("ClassModel");
				$classResult = $classModel->updateClass($className, $classDescription, $password, $classId);

				$this->showScript('Cập nhật thành công.');
				$this->redirect("Teacher/ListClasses");
			}
		}

		$this->view("simple2", [
			"Page"        	=> "simple2_editClass",
			"title"      	=> "Chỉnh sửa lớp học",
			"menu"			=> "simple2_teacher_menu",
			"error"			=> $error,
			"grade"			=> $grade,
			"class"			=> $class
		]);
	}

	public function ListStudentsRequest(){
		$teacherId = $this->getUserId();
		$classModel = $this->model("ClassModel");
		$gradeModel = $this->model("GradeModel");
		$userModel = $this->model("UserModel");

		$classResult = $classModel->getListClasses($teacherId);
		$classes =  [];
		$grades = [];
		$listRequestedFromStudent = [];
		
		//get userclass
		$userClassModel = $this->model("UserClassModel");
		
		while($class = mysqli_fetch_assoc($classResult)){
			$rowRequestToAdd = [];
			
			$classId = $class["ClassId"];
			
			//get info class from grade
			$gradeId = $class["GradeId"];
			$gradeResult = $gradeModel->getGrade($gradeId);
			$grade = mysqli_fetch_assoc($gradeResult);
			$gradeName = $grade["Name"];
			// var_dump($grade);
			
			array_push($rowRequestToAdd, $gradeId);
			array_push($rowRequestToAdd, $gradeName);

			//get list student
			$userClassResult = $userClassModel->getListUserRequestJoinClass($classId);
			
			$rowListStudents = [];
			// $indexStudent = 0;

			while($userClass = mysqli_fetch_assoc($userClassResult)){
				$tmp = [];
				$studentId = $userClass["UserId"];

				$studentResult = $userModel->getUser($studentId);
				
				if(mysqli_num_rows($studentResult) > 0){
					$student = mysqli_fetch_assoc($studentResult);
					// $rowListStudents["studentId"] = $studentId;
					// $rowListStudents["studentName"] = $student["FullName"];
					// $tmp[] 
					$tmp["StudentId"] = $studentId;
					$tmp["StudentName"] = $student["FullName"];

					$rowListStudents["Student_".$studentId] = $tmp;
					// var_dump($tmp);
					// var_dump($student);
				}
			}
			// var_dump($rowListStudents[0]);

			if($rowListStudents != []){
				array_push($rowRequestToAdd, $classId); 
				array_push($rowRequestToAdd, $class["Name"]); 
				$rowRequestToAdd["listStudents"] = $rowListStudents;
				array_push($listRequestedFromStudent, $rowRequestToAdd);
			}
		}

		$this->view("simple2", [
			"Page"        		=> "simple2_listStudentRequest",
			"title"       		=> "Danh sách lớp học",
			"listRequested"		=> $listRequestedFromStudent,
			"menu"				=> "simple2_teacher_menu"
		]);
	}


	public function ApproveStudent($classId, $studentId){
		$userClassModel = $this->model("UserClassModel");
		$userClassResult = $userClassModel->approveStudentJoinClass($classId, $studentId);
		$this->redirect("Teacher/ListStudentsRequest");
	}



	public function ListStudentsClass($classId){
		$userClassModel= $this->model("UserClassModel");
		$userModel = $this->model("UserModel");

		$userClassResult = $userClassModel->getListStudentJoinClass($classId);
		$listStudents = [];

		while ($student = mysqli_fetch_assoc($userClassResult)) {
			$rowToAdd = [];

			$studentId = $student["UserId"];
			$dateJoin = $student["DateJoin"];
			// echo gettype($dateJoin);
			$phpdate = strtotime( $dateJoin );
			$formatDateJoin = date ('Y-m-d H:i:s', $phpdate);
			// $formatDateJoin = $formatDateJoin->format("d-m-Y");

			$userResult = $userModel->getUser($studentId);
			$user = mysqli_fetch_assoc($userResult);
			array_push($rowToAdd, $userId);
			array_push($rowToAdd, $user["Username"]);
			array_push($rowToAdd, $user["Email"]);
			array_push($rowToAdd, $formatDateJoin);

			$listStudents["UsersId_".$studentId] = $rowToAdd;
		}

		$this->view("simple2", [
			"Page"        		=> "simple2_listStudentsClass",
			"title"       		=> "Danh sách học sinh lớp học",
			"listStudents"		=> $listStudents,
			"menu"				=> "simple2_teacher_menu"
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