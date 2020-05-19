<?php

class Manager extends Controller{

    function index(){

		if ($this->is_Admin()) {
			// echo 'test';
			$this->redirect("Manager/danhsachuser");
		}
		elseif ($this->is_Login()) {
			$this->redirect("Home");
		}
		else{
			$this->redirect("Login");
		}
	}
	
    function addExam(){
		$this->view("admin", [
			"Page"  			=> "admin_addexam",
			"title" 			=> "Thi trắc nghiệm trức tuyến"
		]);
	}

	function danhsachuser(){
		//check admin	
		$this->checkIsAdminOrRedirect();
		$userModel = $this->model("UserModel");
		$listUsers = $userModel->getListUsersWithoutCurrentUser($this->getUserId());
		$error = "";
		$users = [];
		$index = 0;

		// print_r()

		if($listUsers != null){
			//fetch list user	
			while ($row = mysqli_fetch_array($listUsers)) {
				
				$rowToAdd = [];
				array_push($rowToAdd, $row["username"]);
				array_push($rowToAdd, $row["fullname"]);
				array_push($rowToAdd, $row["permissionName"]);
				array_push($rowToAdd, $row["user_id"]);
				array_push($rowToAdd, $index+1);
				array_push($rowToAdd, $row["email"]);
				$users[$index] = $rowToAdd;
				$index++;
			}


		}
		else{
			//show nofi doesn't have user
			$error = "Không có user nào khác trong cơ sở dữ liệu.";
		}

		$this->view("admin", [
			"Page"  			=> "admin_danhsachuser",
			"title" 			=> "Danh sách các user",
			"error"				=> $error,
			"users"				=> $users
		]);
		
	}

	function suauser($userId){
		if (!isset($_POST["UpdateUser"])) {
			//check admin	
			$this->checkIsAdminOrRedirect();
			$error = "";
			$userToView = [];
			$index = 0;

			$userModel = $this->model("UserModel");
			$user = $userModel->getUser($userId);
			if ($user != null) {
				while($row = mysqli_fetch_array($user)){
					// print_r($row);
					$userToView[] .= $row["email"];
					$userToView[] .= $row["username"];
					$userToView[] .= $row["fullname"];
					$userToView[] .= $row["role_id"];
				}
			}
			$roleModel = $this->model("RoleModel");
			$roles = $roleModel->getListRoles();
			$rolesToView = [];
			$index = 0;

			while ($row = mysqli_fetch_array($roles)) {
				$rowToAdd = [];

				array_push($rowToAdd, $row["id"]);
				array_push($rowToAdd, $row["name"]);
				array_push($rowToAdd, $row["description"]);
				// print_r($rowToAdd);
				$rolesToView[$index] = $rowToAdd;
				$index++;
			}

			$this->view("admin", [
				"Page"  			=> "admin_suauser",
				"title" 			=> "Thông tin người dùng ",
				"error"				=> $error,
				"user"				=> $userToView,
				"roles" 			=> $rolesToView
			]);
		}
		else{
			//update user
			$this->checkIsAdminOrRedirect();
			$username = $_POST["username"];
			$email = $_POST["email"];
			$fullname = $_POST["fullname"];
			$role_id = $_POST["role_id"];

			// echo 'vo post';

			if (isset($username) && isset($email) && isset($fullname) && isset($role_id)) {
				$userModel = $this->model("UserModel");
				$userModel->updateUserInformation($fullname, $username, $role_id, $userId);
			
				$this->redirect("Manager/suauser/".$userId);
			}
			
		}
	}

	private function checkIsAdminOrRedirect(){
		if (!$this->is_Admin()) {
			if ($this->is_Login()) {
				$this->redirect("Home");
			}
			else{
				$this->redirect("Login");
			}	
		}
	}

	function danhsachkhoi(){
		$this->checkIsAdminOrRedirect();

		$grades = [];
		$gradeMode = $this->model("GradesModel");
		$result = $gradeMode->getListGrades();
		$index = 0;

		while($row = mysqli_fetch_array($result)){
			$rowToAdd = [];
			array_push($rowToAdd, $row["id"]);
			array_push($rowToAdd, $row["name"]);
			$grades[$index] = $rowToAdd;
			$index++;
		}

		$this->view("admin", [
			"Page"  			=> "admin_danhsachkhoi",
			"title" 			=> "Danh sách khối",
			"grades"			=> $grades
		]);
	
	}

	function danhsachbaithi(){
		$this->checkIsAdminOrRedirect();
		
		$examModel = $this->model("ExamsModel");
		$result = $examModel->getListExams();
		$index = 0;
		$exams = [];

		while ($row = mysqli_fetch_array($result)) {
			$rowToAdd = [];

			array_push($rowToAdd, $row["id"]);
			array_push($rowToAdd, $row["description"]);
			array_push($rowToAdd, $this->getNameUserWithId((int)$row["user_id"]));
			array_push($rowToAdd, $this->getNameGradeWithId((int)$row["grade_id"]));
			array_push($rowToAdd, $this->getNameExamTimeWithId((int)$row["exam_time_id"]));

			$exams[$index] = $rowToAdd;
			$index++;

		}

		$this->view("admin", [
			"Page"  			=> "admin_danhsachbaithi",
			"title" 			=> "Các user đã chọn",
			"exams"				=> $exams
		]);
	}

	function suabaithi($examId){
		if (!isset($_POST["updateExam"])) {
			$this->checkIsAdminOrRedirect();

			$examModel = $this->model("ExamsModel");
			$result = $examModel->getExam($examId);
			$exam = [];
			$rowToAdd = [];
			
			while ($row = mysqli_fetch_array($result)) {

				array_push($rowToAdd, $row["id"]);
				array_push($rowToAdd, $row["description"]);
				array_push($rowToAdd, $this->getNameUserWithId((int)$row["user_id"]));
				array_push($rowToAdd, $this->getNameGradeWithId((int)$row["grade_id"]));
				array_push($rowToAdd, $this->getNameExamTimeWithId((int)$row["exam_time_id"]));

				// array_push($exam, $rowToAdd);
			}
			
			$this->view("admin", [
				"Page"  			=> "admin_suabaithi",
				"title" 			=> "Sửa thông tin bài thi",
				"exam" 				=> $rowToAdd
			]);

		} else {
			$this->checkIsAdminOrRedirect();

			$description = $_POST["description"];

			if (isset($description)) {
				$examModel = $this->model("ExamsModel");
				$result = $examModel->updateExam();
				$this->redirect("Manager/suabaithi/".$examId);
			}
		}
		
	}

	public function suakhoi($gradeId){
		if (!isset($_POST["updateGrade"])) {
			$this->checkIsAdminOrRedirect();

			$gradeMode = $this->model("GradesModel");
			$result = $gradeMode->getGrade($gradeId);
			
			while ($row = mysqli_fetch_array($result)) {
				$grade["id"] = $row["id"];
				$grade["name"] = $row["name"];
			}
			
			$this->view("admin", [
				"Page"  			=> "admin_suakhoi",
				"title" 			=> "Sửa thông tin khối",
				"grade" 			=> $grade
			]);
		} else {
			$this->checkIsAdminOrRedirect();

			$gradeName = $_POST["grade_name"];

			if (isset($gradeName)) {
				$gradeMode = $this->model("GradesModel");
				$result = $gradeMode->updateGrade($gradeId, $gradeName);
				$this->redirect("Manager/suakhoi/".$gradeId);
			}
		}
	}

	public function themkhoi(){
		if (!isset($_POST["addGrade"])) {
			$this->checkIsAdminOrRedirect();

			$this->view("admin", [
				"Page"  			=> "admin_themkhoi",
				"title" 			=> "Thêm khối lớp học"
			]);
		}
		else{
			$this->checkIsAdminOrRedirect();
			$gradeName = $_POST["grade_name"];
			
			if (isset($gradeName)) {
				$gradeModel = $this->model("GradesModel");
				$gradeModel->addGrade($gradeName);

				$this->redirect("Manager/danhsachkhoi");	
			}
		}
	}

	public function danhsachmon(){
		$this->checkIsAdminOrRedirect();
		$examModel = $this->model("SubjectModel");
		$result = $examModel->getListSubjects();
		$subjects = [];
		$index = 0;

		//fetch list user	
		while ($row = mysqli_fetch_array($result)) {
			$rowToAdd = [];
			array_push($rowToAdd, $row["id"]);
			array_push($rowToAdd, $row["name"]);
			$subjects[$index] = $rowToAdd;
			$index++;
		}

		$this->view("admin", [
			"Page"  			=> "admin_danhsachmon",
			"title" 			=> "Danh sách các môn học",
			"subjects"			=> $subjects
		]);
	}

	public function suamon($subjectId){
		if (!isset($_POST["updateSubject"])) {
			//check admin	
			$this->checkIsAdminOrRedirect();

			$subject = [];
			$index = 0;

			$subjectModel = $this->model("SubjectModel");
			$result = $subjectModel->getSubject($subjectId);
			
			if ($result != null) {
				while($row = mysqli_fetch_array($result)){
					
					$subject[] .= $row["id"];
					$subject[] .= $row["name"];
				}
			}

			$this->view("admin", [
				"Page"  			=> "admin_suamon",
				"title" 			=> "Sửa môn học.",
				"subject"			=> $subject
			]);
		}
		else{
			//update user
			$this->checkIsAdminOrRedirect();

			$subjectName = $_POST["subject_name"];

			if (isset($subjectName)) {
				$subjectModel = $this->model("SubjectModel");
				$subjectModel->updateSubject($subjectId, $subjectName);
			
				$this->redirect("Manager/suamon/".$subjectId);
			}
			
		}
	}

	public function themmon(){
		if (!isset($_POST["addSubject"])) {
			$this->checkIsAdminOrRedirect();

			$this->view("admin", [
				"Page"  			=> "admin_themmon",
				"title" 			=> "Thêm môn học"
			]);
		}
		else{
			$this->checkIsAdminOrRedirect();
			$subjectName = $_POST["subject_name"];
			
			if (isset($subjectName)) {
				$subjectModel = $this->model("SubjectModel");
				$subjectModel->addSubject($subjectName);
				$this->redirect("Manager/danhsachmon");	
			}
		}
	}


	public function thembaithi(){

	}

	private function getSubjectIdToView(){

	}
	
	private function getGradeIdToView(){

	}

	private function getExamTimeIdToView(){
		
	}

	private function getNameUserWithId($userId){
		$userModel = $this->model("UserModel");
		$result = $userModel->getUser($userId);
		$row = mysqli_fetch_array($result);
		$userName = $row["fullname"];

		return $userName;
	}

	private function getNameGradeWithId($gradeId){
		$gradeMode = $this->model("GradesModel");
		$result = $gradeMode->getGrade($gradeId);
		$row = mysqli_fetch_array($result);
		$gradeName = $row["name"];

		return $gradeName;
	}

	private function getNameExamTimeWithId($examTimeId){
		$examTimeModel = $this->model("ExamTimeModel");
		$result = $examTimeModel->getExamTime($examTimeId);
		$row = mysqli_fetch_array($result);

		return (int)$row["time"];
	}

}
?>