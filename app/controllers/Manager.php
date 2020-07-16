<?php

class Manager extends Controller
{

    public function index()
    {
        if ($this->is_Admin()) {
            $this->redirect("Manager/ListUsers");
        } elseif ($this->is_Login()) {
            $this->redirect("Home");
        } else {
            $this->redirect("Login");
        }
    }

    public function thembaithi()
    {
        if (!isset($_POST["AddExam"])) {
            $this->checkIsAdminOrRedirect();

            $grades = $this->getListNameGrade();
            $subjects = $this->getListNameSubject();
            $examTimes = $this->getListNameExamTime();

            $this->view("admin", [
                "Page" => "admin_thembaithi",
                "title" => "Thêm bài thi",
                "grades" => $grades,
                "subjects" => $subjects,
                "examTimes" => $examTimes,
            ]);

        } else {
            $this->checkIsAdminOrRedirect();
            //add exams
            $examModel = $this->model("ExamsModel");
            $examTimeSelect = $_POST['examTimeSelect'];
            $gradeSelected = $_POST["gradeSelected"];
            $subjectSelected = $_POST["subjectSelected"];
            $exam_description = $_POST["exam_description"];
            //echo $exam_description;

            $examModel->addExams($exam_description, $this->getUserId(), $subjectSelected, $gradeSelected, $examTimeSelect);

            //add question
            $counter = $_POST["counter_questions"];
            for ($index = 1; $index <= $counter; $index++) {
                $question = $_POST["nameQuestion_" . $index];
                $questionModel = $this->model("QuestionModel");
                $questionModel->addQuestion($question);
                $questionId = $questionModel->IdQuestion();
                // echo $questionId;

                for ($ans = 1; $ans <= 4; $ans++) {
                    @$ansContent = $_POST["answers_" . $index . "_" . $ans];
                    // echo $ansContent;

                    $answerModel = $this->model("AnswerModel");
                    $is_correct = 1;
                    if ($_POST["answers_radio_" . $index] == $ans) {
                        $is_correct = 2;
                    }
                    echo $is_correct;
                    $answerModel->addAnswer($ansContent, $is_correct, $questionId);
                    //    echo $ansContent . $is_correct . $questionId;
                }
            }
        }
    }

    public function ListUsers()
    {
        //check admin
        $this->checkIsAdminOrRedirect();
        $userModel = $this->model("UserModel");
        $listUsers = $userModel->getListUsersWithoutCurrentUser($this->getUserId());
        $error = "";
        $users = [];
        $index = 0;

        // print_r()

        if ($listUsers != null) {
            //fetch list user
            while ($row = mysqli_fetch_assoc($listUsers)) {

                $rowToAdd = [];
                array_push($rowToAdd, $row["Username"]);
                array_push($rowToAdd, $row["FullName"]);
                array_push($rowToAdd, $row["RoleName"]);
                array_push($rowToAdd, $row["UserId"]);
                array_push($rowToAdd, $index + 1);
				array_push($rowToAdd, $row["Email"]);
				array_push($rowToAdd, $row["Active"]);
				
                $users[$index] = $rowToAdd;
                $index++;
                //print_r($row);
            }

        } else {
            //show nofi doesn't have user
            $error = "Không có user nào khác trong cơ sở dữ liệu.";
        }

        $this->view("admin", [
            "Page" => "admin_listUsers",
            "title" => "Danh sách các user",
            "error" => $error,
            "users" => $users,
        ]);

	}

	public function HiddenSubject($subjectId)
    {
        $this->checkIsAdminOrRedirect();
		$subjectModel = $this->model("SubjectModel");        
		$subjectResult = $subjectModel->hiddenSubject($subjectId);

		$this->redirect("Manager/ListSubjects");
    }

    public function HiddenChapter($chapterId){
        $this->checkIsAdminOrRedirect();
		$chapterModel = $this->model("ChapterModel");        
		$chapterResult = $chapterModel->hiddenChapter($chapterId);

		$this->redirect("Manager/ListChapters");
    }
  
	public function HiddenGrade($gradeId)
    {
        //check admin
        $this->checkIsAdminOrRedirect();
		$gradeModel = $this->model("GradeModel");        
		$gradeResult = $gradeModel->hiddenGrade($gradeId);

		$this->redirect("Manager/ListGrades");
	}
	
	public function BlockUser($userId){
		$this->checkIsAdminOrRedirect();

		$userModel = $this->model("UserModel");
		$userResult = $userModel->blockUser($userId);

		$this->redirect("Manager/ListUsers");
	}

	public function ActiveUser($userId){
		$this->checkIsAdminOrRedirect();

		$userModel = $this->model("UserModel");
		$userResult = $userModel->activeUser($userId);

		$this->redirect("Manager/ListUsers");
	}

	public function EditUser($userId)
    {
        if (!isset($_POST["UpdateUser"])) {
            //check admin
            $this->checkIsAdminOrRedirect();
            $error = "";
            $userToView = [];
            $index = 0;

            $userModel = $this->model("UserModel");
            $user = $userModel->getUser($userId);
            if ($user != null) {
                while ($row = mysqli_fetch_assoc($user)) {
                    // print_r($row);
                    $userToView[] .= $row["Email"];
                    $userToView[] .= $row["Username"];
                    $userToView[] .= $row["FullName"];
                    $userToView[] .= $row["RoleId"];
                }
            }
            $roleModel = $this->model("RoleModel");
            $roles = $roleModel->getListRoles();
            $rolesToView = [];
            $index = 0;

            while ($row = mysqli_fetch_assoc($roles)) {
                $rowToAdd = [];

                array_push($rowToAdd, $row["RoleId"]);
                array_push($rowToAdd, $row["Name"]);
                array_push($rowToAdd, $row["Description"]);
                // print_r($rowToAdd);
                $rolesToView[$index] = $rowToAdd;
                $index++;
            }

            $this->view("admin", [
                "Page" => "admin_editUser",
                "title" => "Thông tin người dùng ",
                "error" => $error,
                "user" => $userToView,
                "roles" => $rolesToView,
            ]);
        } else {
            //update user
            $this->checkIsAdminOrRedirect();
            $username = $_POST["username"];
            $fullname = $_POST["fullname"];
            $role_id = $_POST["roleSelect"];

            // echo 'vo post';

            if (isset($username) && isset($fullname) && isset($role_id)) {
                $userModel = $this->model("UserModel");
                $userModel->updateUserInformation($fullname, $username, $role_id, $userId);

                $this->redirect("Manager/EditUser/" . $userId);
            } else {
                $this->messageBox("Vui lòng nhập đầy đủ thông tin.");
                $this->redirect("Manager/EditUser/" . $userId);
            }
        }
    }

    public function ListGrades()
    {
        $this->checkIsAdminOrRedirect();

        $grades = [];
        $gradeMode = $this->model("GradeModel");
        $result = $gradeMode->getListGrades();
        $index = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $rowToAdd = [];

            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($rowToAdd, $row["Description"]);

            $grades[$index] = $rowToAdd;
            $index++;
        }

        $this->view("admin", [
            "Page" => "admin_listGrades",
            "title" => "Danh sách khối",
            "grades" => $grades,
        ]);

    }

    function danhsachbaithi()
    {
        $this->checkIsAdminOrRedirect();

        $examModel = $this->model("ExamsModel");
        $result = $examModel->getListExams();
        $index = 0;
        $exams = [];

        while ($row = mysqli_fetch_array($result)) {
            $rowToAdd = [];

            array_push($rowToAdd, $row["id"]);
            array_push($rowToAdd, $row["description"]);
            array_push($rowToAdd, $this->getNameUserWithId((int) $row["user_id"]));
            array_push($rowToAdd, $this->getNameGradeWithId((int) $row["grade_id"]));
            array_push($rowToAdd, $this->getNameExamTimeWithId((int) $row["exam_time_id"]));

            $exams[$index] = $rowToAdd;
            $index++;

        }

        $this->view("admin", [
            "Page" => "admin_danhsachbaithi",
            "title" => "Các user đã chọn",
            "exams" => $exams,
        ]);
    }

    public function suabaithi($examId)
    {
        if (!isset($_POST["updateExam"])) {
            $this->checkIsAdminOrRedirect();

            $examModel = $this->model("ExamsModel");
            $result = $examModel->getExam($examId);
            $exam = [];
            $rowToAdd = [];

            while ($row = mysqli_fetch_array($result)) {

                array_push($rowToAdd, $row["id"]);
                array_push($rowToAdd, $row["description"]);
                array_push($rowToAdd, $this->getNameUserWithId((int) $row["user_id"]));
                array_push($rowToAdd, (int) $row["grade_id"]);
                array_push($rowToAdd, (int) $row["exam_time_id"]);
                array_push($rowToAdd, (int) $row["subject_id"]);

                // array_push($exam, $rowToAdd);
            }

            $grades = $this->getListNameGrade();
            $subjects = $this->getListNameSubject();
            $examTimes = $this->getListNameExamTime();

            $this->view("admin", [
                "Page" => "admin_suabaithi",
                "title" => "Sửa thông tin bài thi",
                "exam" => $rowToAdd,
                "grades" => $grades,
                "subjects" => $subjects,
                "examTimes" => $examTimes,
            ]);

        } else {
            $this->checkIsAdminOrRedirect();

            $description = $_POST["description"];
            $gradeId = $_POST["gradeSelected"];
            $subjectId = $_POST["subjectSelected"];

            if (isset($description) && isset($gradeId)) {
                $examModel = $this->model("ExamsModel");
                $result = $examModel->updateExam($description, $subjectId, $gradeId, $exam_time_id, $examId);
                $this->redirect("Manager/suabaithi/" . $examId);
            }
        }

    }

    public function EditGrade($gradeId)
    {
        $this->checkIsAdminOrRedirect();
		$error = [];
        $gradeMode = $this->model("GradeModel");
        $result = $gradeMode->getGrade($gradeId);
        while ($row = mysqli_fetch_assoc($result)) {
            $grade["id"] = $gradeId;
            $grade["name"] = $row["Name"];
            $grade["description"] = $row["Description"];
        }

        $oldGrade = $grade["name"];

		if (isset($_POST["updateGrade"])) {
            $gradeName = $_POST["gradeName"];
            $gradeDescription = $_POST["description"];

            if(!isset($gradeName) || $gradeName == "" ) {
				$error["gradeName"] = "Vui lòng nhập tên khối.";
            } 
            else{
                $oldGrade = $_POST["oldGrade"];

                if($gradeName != $oldGrade){
                    $result = $gradeMode->checkExistsGradeName($gradeName);
                    print_r($result);
                    if($result == true){
                        $error["gradeExists"] = "Khối lớp học đã bị tồn tại.";
                    }
                }
            }

			if(!isset($gradeDescription) || $gradeDescription == "") {
                $error["gradeDescription"] = "Vui lòng nhập mô tả khối lớp học.";
			}

			if($error == []){
                $result = $gradeMode->updateGrade($gradeId, $gradeName, $gradeDescription);
	
                $this->messageBox("Cập nhật thành công.");
                $this->redirect("Manager/EditGrade/" . $gradeId);
			}
		}

		$this->view("admin", [
			"Page"      => "admin_editGrade",
			"title"     => "Thêm khối lớp học",
            "error"     => $error,
            "grade"     => $grade,
            "oldGrade"  => $oldGrade
		]);
    }

    public function AddGrade()
    {
		$this->checkIsAdminOrRedirect();
		$error = [];

		if (isset($_POST["addGrade"])) {
            $gradeName = $_POST["gradeName"];
            $gradeDescription = $_POST["decription"];

            if(!isset($gradeName) || $gradeName == "" ) {
				$error["gradeName"] = "Vui lòng nhập tên khối.";
            } 
            else{

                $gradeMode = $this->model("GradeModel");
                $result = $gradeMode->checkExistsGradeName($gradeName);
                if($result == true){
                    $error["gradeExists"] = "Khối lớp học đã bị tồn tại.";
                }
            }

			if(!isset($gradeDescription) || $gradeDescription == "") {
                $error["gradeDescription"] = "Vui lòng nhập mô tả khối lớp học.";
			}

			if($error == []){
				$gradeModel = $this->model("GradeModel");
				$gradeModel->addGrade($gradeName, $gradeDescription);
	
				$this->messageBox("Thêm khối thành công.");
				$this->redirect("Manager/ListGrades");
			}
		}

		$this->view("admin", [
			"Page" => "admin_addGrade",
			"title" => "Thêm khối lớp học",
			"error" => $error
		]);
    }

    public function ListSubjects()
    {
        $this->checkIsAdminOrRedirect();
        $subjectModel = $this->model("SubjectModel");
        $result = $subjectModel->getListSubjects();
        $subjects = [];
        $index = 0;

        //fetch list user
        while ($row = mysqli_fetch_assoc($result)) {
            $rowToAdd = [];
            $subjectId = $row["SubjectId"];
            array_push($rowToAdd, $subjectId);
            array_push($rowToAdd, $row["Name"]);
            $gradeName = $this->getGradeNameBySubjectId($subjectId);
			array_push($rowToAdd, $gradeName);
			// print_r($row["Description"]);
            array_push($rowToAdd, $row["Description"]);

            $subjects[$index] = $rowToAdd;
            $index++;
        }

        $this->view("admin", [
            "Page" => "admin_listSubjects",
            "title" => "Danh sách các môn học",
            "subjects" => $subjects,
        ]);
    }

    public function EditSubject($subjectId)
    {
        $this->checkIsAdminOrRedirect();
        $error = [];

        if (isset($_POST["updateSubject"])) {
            $subjectName = $_POST["subjectName"];
            $subjectDescription = $_POST["subjectDescription"];
            $gradeId = $_POST["gradeSelect"];
            $oldSubjectName = $_POST["oldSubjectName"];

            if (!isset($subjectName) || $subjectName == "") {
                $error["subjectName"] = "Vui lòng nhập tên môn học.";
            }
            else{
                if($oldSubjectName != $subjectName){
                    $subjectModel = $this->model("SubjectModel");
                    $subjectResult = $subjectModel->checkSubjectExistBySubjectName(
                        $subjectName, $gradeId
                    );
                    
                    if($subjectResult == true){
                        $error["subjectExists"] = "Môn học đã tồn tại trong khối.";
                    }
                }
            }

            if($error == []){
                $subjectModel = $this->model("SubjectModel");
                $subjectModel->updateSubject($subjectId, $subjectName, $subjectDescription);
                $gradeSubjectModel = $this->model("GradeSubjectModel");
                $gradeSubjectResult = $gradeSubjectModel->updateGradeId($subjectId, $gradeId);

                $this->messageBox("Cập nhật thành công.");
                $this->redirect("Manager/ListSubjects");
            }
        }
        
        $subject = [];
        $index = 0;

        $subjectModel = $this->model("SubjectModel");
        $result = $subjectModel->getSubject($subjectId);
        $gradeModel = $this->model("GradeModel");
        $gradesList = $gradeModel->getListGrades();
        $gradeToView = [];
        $index = 0;
        $gradeSubjectModel = $this->model("GradeSubjectModel");
        $gradeSubjectResult = $gradeSubjectModel->getGradeIdBySubjectId($subjectId);
        $gradeRow = mysqli_fetch_assoc($gradeSubjectResult);
        $gradeId = $gradeRow["GradeId"];
        $oldSubjectName = "";

        while ($row = mysqli_fetch_assoc($gradesList)) {
            $rowToAdd = [];

            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($rowToAdd, $row["Description"]);
            $gradeToView[$index] = $rowToAdd;
            $index++;
        }
        
        if ($result != null) {
            while ($row = mysqli_fetch_assoc($result)) {
                $subject[] .= $row["SubjectId"];
                $subject[] .= $row["Name"];
                $subject[] .= $row["Description"];
                $oldSubjectName = $row["Name"];
            }
        }

        $this->view("admin", [
            "Page"              => "admin_editSubject",
            "title"             => "Sửa môn học.",
            "subject"           => $subject,
            "grades"            => $gradeToView,
            "gradeId"           => $gradeId,
            "oldSubjectName"    => $oldSubjectName,
            "error"             => $error
        ]);

    }

    public function AddSubject()
    {
        $this->checkIsAdminOrRedirect();
        $error = [];

        if (isset($_POST["addSubject"])) {
            $subjectName = $_POST["subjectName"];
            $subjectDescription = $_POST["subjectDescription"];
            $gradeId = $_POST["gradeSelect"];

            if(!isset($subjectName) || $subjectName == "") {
               $error["subjectName"] = "Vui lòng nhập tên môn.";
            }
            else{
                $subjectModel = $this->model("SubjectModel");
                $subjectResult = $subjectModel->checkSubjectExistBySubjectName(
                    $subjectName, $gradeId
                );
                
                if($subjectResult == true){
                    $error["subjectExists"] = "Môn học đã tồn tại trong khối.";
                }
            }

            if(!isset($subjectDescription) || $subjectDescription == "") {
                $error["subjectDescription"] = "Vui lòng nhập mô tả môn.";
            }

            if($error == []){
                $subjectModel = $this->model("SubjectModel");
                $subjectId = $subjectModel->addSubject($subjectName, $subjectDescription);
                $gradeSubjectModel = $this->model("GradeSubjectModel");
                $resultInsertGradeSubject = $gradeSubjectModel->addGradeSubject($gradeId, $subjectId);

                $this->messageBox("Thêm môn thành công.");
                $this->redirect("Manager/ListSubjects");
            }
        }

        $gradeModel = $this->model("GradeModel");
        $result = $gradeModel->getListGrades();
        $grades = [];

        while ($row = mysqli_fetch_array($result)) {
            $rowToAdd = [];
            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($grades, $rowToAdd);
        }

        $this->view("admin", [
            "Page"      => "admin_addSubject",
            "title"     => "Thêm môn học",
            "grades"    => $grades,
            "error"     => $error
        ]);
    }

    public function GetListSubjectWithAjax($gradeId){
        $this->checkIsAdminOrRedirect();
        $gradeSubjectModel = $this->model("GradeSubjectModel");
        $gradeSubjectResult = $gradeSubjectModel->getListSubjectsByGradeId($gradeId);
        $arr = [];
        $subjectModel = $this->model("SubjectModel");
        
        while ($row = mysqli_fetch_assoc($gradeSubjectResult)) {
            $subjectId = $row["SubjectId"];
            $subjectResult = $subjectModel->getSubject($subjectId);            
            $subjectName = mysqli_fetch_assoc($subjectResult)["Name"];
            $tmp = array(
                "Id"    => $subjectId,
                "Name"  => $subjectName
            );

            array_push($arr, $tmp);
        }

        echo json_encode($arr);
    }


    public function AddChapter(){
        $this->checkIsAdminOrRedirect();
		$error = [];

		if (isset($_POST["addChapter"])) {
            $chapterName = $_POST["chapterName"];
            $chapterDescription = $_POST["chapterDescription"];
            $gradeId = $_POST["gradeSelect"];
            $subjectId = @$_POST["subjectSelect"];
            $gradeSubjectId = 0;

            if(!isset($chapterName) || $chapterName == "" ) {
				$error["chapterName"] = "Vui lòng nhập tên chương.";
            } 
            else{

                $gradeSubjectModel = $this->model("GradeSubjectModel");
                $gradeSubjectId = @$gradeSubjectModel->findGradeSubjectIdByGradeIdAndSubjectId($gradeId, $subjectId);

                $chapterModel = $this->model("ChapterModel");
                $result = @$chapterModel->checkExistsChapter($chapterName, $gradeSubjectId);

                if($result == true){
                    $error["chapterName"] = "Chương đã bị tồn tại.";
                }
            }
            
            if(!isset($subjectId) || $subjectId == "" ) {
				$error["subjectError"] = "Vui lòng chọn khối lớp khác.";
            } 

			if($error == []){
                $chapterModel = $this->model("ChapterModel");
                // var_dump($chapterName, $gradeId, $subjectId, $chapterDescription);
                
				$chapterModel->addChapter($chapterName, $gradeSubjectId, $chapterDescription);
	
				$this->messageBox("Thêm chương thành công.");
				$this->redirect("Manager/ListChapters");
			}
        }
        
        $gradeModel = $this->model("GradeModel");
        $result = $gradeModel->getListGrades();
        $grades = [];
        // var_dump($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $rowToAdd = [];
            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($grades, $rowToAdd);
        }

        //var_dump($grades);

		$this->view("admin", [
			"Page"      => "admin_addChapter",
			"title"     => "Thêm chương học",
            "error"     => $error,
            "grades"    => $grades
		]);
    }

    public function EditChapter($chapterId){
        $this->checkIsAdminOrRedirect();

        $chapterModel = $this->model("ChapterModel");
        $chapterResult = $chapterModel->getChapterById($chapterId);

        $chapter = [];
        $row = mysqli_fetch_assoc($chapterResult);
        $chapter["chapterId"] = $row["ChapterId"];
        $chapter["chapterName"] = $row["Name"];
        $chapter["chapterDescription"] = $row["Description"];
        $chapter["GradeSubjectId"] = $row["GradeSubjectId"];

        $gradeSubjectModel = $this->model("GradeSubjectModel");
        $gradeSubjectResult = $gradeSubjectModel->getGradeSubjectById($chapter["GradeSubjectId"]);
        $row = mysqli_fetch_assoc($gradeSubjectResult);
        $gradeId = $row["GradeId"];
        $subjectId = $row["SubjectId"];

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getListGrades();
        $grades = [];

        while($row = mysqli_fetch_assoc($gradeResult)){
            $rowToAdd = [];
            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["Name"]);
            array_push($grades, $rowToAdd);
        }

        $gradeSubjectResult = $gradeSubjectModel->getListSubjectFilterByGrade($gradeId);
        $subjects = []; 

        while ($row = mysqli_fetch_assoc($gradeSubjectResult)) {
            $rowToAdd = [];
            array_push($rowToAdd, $row["GradeId"]);
            array_push($rowToAdd, $row["SubjectId"]);
            array_push($rowToAdd, $row["SubjectName"]);
            array_push($subjects, $rowToAdd);
        }

        // var_dump($gradeSubjectResult);
        //update chapter
        $error = [];
        if (isset($_POST["updateChapter"])) {
            // $gradeId = $_POST["gradeSelect"];
            // $subjectId = $_POST["subjectSelect"];
            $chapterName = $_POST["chapterName"];
            $chapterDescription = $_POST["chapterDescription"];
            // echo $subjectId;

            if(!isset($chapterName) || $chapterName == "") {
               $error["chapterName"] = "Vui lòng nhập tên chương.";
            }
            else{
                $chapterResult = $chapterModel->checkExistChapterByName($chapterName, $gradeId, $subjectId);
                                
                if($chapterResult == true){
                    //$this->messageBox("ton tai.");
                    $error["chapterExists"] = "Chương đã tồn tại.";
                }
            }
            
            // if(!isset($subjectId) || $subjectId == "") {
            //     $error["subjectId"] = "Vui lòng chọn khối và môn học.";
            // }

            if(!isset($chapterDescription) || $chapterDescription == "") {
                $error["chapterDescription"] = "Vui lòng nhập mô tả.";
            }

            if($error == []){
                // $chapterModel = $this->model("SubjectModel");
                $chapterModel->updateChapter($chapterName, $chapterDescription, $chapterId);
                $chapterResult = $chapterModel->getChapterById($chapterId);
                // $chapter = mysqli_fetch_assoc($chapterResult);
                // $gradeSubjectId = $chapter["GradeSubjectId"];
                // // var_dump($chapterId, $gradeId, );
                // $gradeSubjectResult = $gradeSubjectModel->updateGradeSubjectById($gradeSubjectId, $gradeId, $subjectId);
                // $resultInsertGradeSubject = $gradeSubjectModel->addGradeSubject($gradeId, $subjectId);

                $this->messageBox("Cập nhật chương thành công.");
                $this->redirect("Manager/ListChapters");
            }
        }

        $this->view("admin", [
			"Page"          => "admin_editChapter",
			"title"         => "Chỉnh sửa chương",
            "chapter"       => $chapter,
            "gradeId"       => $gradeId,
            "grades"        => $grades,
            "subjectId"     => $subjectId,
            "subjects"      => $subjects
		]);
    }

    public function ListChapters(){
        $this->checkIsAdminOrRedirect();

        $chapterModel = $this->model("ChapterModel");
        $chapterResult = $chapterModel->getListChapters();
        $chapters = [];

        while($row = mysqli_fetch_assoc($chapterResult)){
            $rowToAdd = [];
            array_push($rowToAdd, $row["ChapterId"]);
            array_push($rowToAdd, $row["ChapterName"]);
            array_push($rowToAdd, $row["GradeName"]);
            array_push($rowToAdd, $row["SubjectName"]);

            array_push($chapters, $rowToAdd);
        }

        $this->view("admin", [
			"Page"      => "admin_listChapters",
			"title"     => "Danh sach chương",
            "chapters"    => $chapters
		]);
    }


    public function DeleteSubject($subjectId){
        $this->checkIsAdminOrRedirect();
        $gradeSubjectModel = $this->model("GradeSubjectModel");
        $gradeSubjectResult = $gradeSubjectModel->deleteGradeBySubjectId($subjectId);

        $subjectModel = $this->model("SubjectModel");

        $subjectResult = $subjectModel->deleteSubject($subjectId);
        $this->redirect("Manager/ListSubjects");
    }

    private function getNameUserWithId($userId)
    {
        $userModel = $this->model("UserModel");
        $result = $userModel->getUser($userId);
        $row = mysqli_fetch_array($result);
        $userName = $row["fullname"];

        return $userName;
    }

    private function getNameGradeWithId($gradeId)
    {
        $gradeMode = $this->model("GradeModel");
        $result = $gradeMode->getGrade($gradeId);
        $row = mysqli_fetch_assoc($result);
        $gradeName = $row["name"];

        return $gradeName;
    }

    private function getNameExamTimeWithId($examTimeId)
    {
        $examTimeModel = $this->model("ExamTimeModel");
        $result = $examTimeModel->getExamTime($examTimeId);
        $row = mysqli_fetch_array($result);

        return (int) $row["time"];
    }

    private function checkIsAdminOrRedirect()
    {
        
            if ($this->is_Login()) {
                if (!$this->is_Admin()) {
                    $this->redirect("Home");
                }
            } else {
                $this->redirect("Login");
            }
        
    }

    private function getGradeNameBySubjectId($subjectId)
    {
        $gradeSubjectModel = $this->model("GradeSubjectModel");
        $gradeSubjectResult = $gradeSubjectModel->getGradeIdBySubjectId($subjectId);
        $gradeSubjectRow = mysqli_fetch_assoc($gradeSubjectResult);
        $gradeId = $gradeSubjectRow["GradeId"];

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getGrade($gradeId);
        $gradeRow = mysqli_fetch_assoc($gradeResult);
        $gradeName = $gradeRow["Name"];

        return $gradeName;
    }
}