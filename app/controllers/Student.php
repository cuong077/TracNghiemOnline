<?php
class Student extends Controller{
    public function __construct(){
        // echo $this->getUserId();
    	if(!$this->is_Student()){
    		$this->redirect("Home");
    		exit;
    	}
    }
    
    public function ListClasses(){

        $classModel = $this->model("ClassModel");
		$userId = $this->getUserId();
        $classResult = $classModel->getListClassesForStudent($userId);
        $classes = [];

        $gradeModel = $this->model("GradeModel");
		$gradeResult = $gradeModel->getListGrades();
		$grades = [];
        $userClassModel = $this->model("UserClassModel");
        $total = 0;
        
        while ($row = mysqli_fetch_assoc($classResult)) {
            $classId = (int)$row["ClassId"];
            $joinClass = $userClassModel->checkUserJoinClass($userId, $classId);
            $total = $userClassModel->getTotalUserJoinedClass($classId);
			$row["total"] = $total;

            if($joinClass == true){
                $row["joined"] = "true";
            }
            else{
                $row["joined"] = "false";
            }

            array_push($classes, $row);
        }

		while ($row = mysqli_fetch_assoc($gradeResult)) {
			array_push($grades, $row);
		}

        $this->view("simple2", [
            "Page"                           => "simple2_student_listclasses",
            "title"       	                 => "Danh sách lớp học",
			"classes"	                     => $classes,
			"grades"	                     => $grades,
            "menu"			                 => "simple2_student_menu",
            "totalUserJoinedClass"           => $total 
          ]);
    }

    public function JoinClass($classId){
        $error = [];

        $classModel = $this->model("ClassModel");
		$classResult = $classModel->getClassById($classId);
		$class = mysqli_fetch_assoc($classResult);
        $classId = $class["ClassId"];
        $teacherId = $class["UserId"];
        $password = $class["Password"];

        $userClassModel = $this->model("UserClassModel");
        $userId = $this->getUserId();
        $isRequested = $userClassModel->isRequestJoinClass($userId, $classId);
        $isShowRequestForm = "true";
        
        if($isRequested == true){
            $isShowRequestForm = "false";
        }

        // $isShowRequestForm = "false";

        $gradeModel = $this->model("GradeModel");
        $gradeResult = $gradeModel->getGradeNameWithClassId($classId);
        $grade = mysqli_fetch_assoc($gradeResult);
        $gradeName = $grade["Name"];
        
        $userModel = $this->model("UserModel");
        $userResult = $userModel->getUser((int)$teacherId);
        $user = mysqli_fetch_assoc($userResult);
        $teacherName = $user["FullName"];

        if(isset($_POST["joinClass"])){
            // insert info about join class for user.
            $passwordInput = $_POST["PasswordJoinClass"];
            if(strtolower($passwordInput) != strtolower($password)){
                $error["password"] = "Mật khẩu nhập không chính xác.";
            }

            if($error == []){
                $userClassResult = $userClassModel->insertUserClass($userId, $classId);
                // $this->redirect("Student/JoinClass/" + $classId);
            }
        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_joinClass",
            "title"       	                 => "Join class",
            "menu"			                 => "simple2_student_menu",
            "class"			                 => $class,
            "error"			                 => $error,
            "grade"			                 => $gradeName,
            "teacher"                        => $teacherName,
            "isShowRequestForm"              => $isShowRequestForm
        ]);
    }

    public function JoinClassWithId(){

        $isShowRequestForm = true;
        $error = [];
        $userModel = $this->model("UserModel");
        $classModel = $this->model("classModel");
        $userClassModel = $this->model("UserClassModel");

        if(isset($_POST["joinClass"])){
            $classId = $_POST["classId"];
            if(!isset($classId)){
                $error["classId"] = "Vui lòng nhập id lớp học.";
            }
            else{
                try {
                    $classId = (int)$classId;
                    // echo $classId;
                    $userId = $this->getUserId();
                    $userResult = $userModel->getUser($userId);
                    $user = mysqli_fetch_assoc($userResult);
                    $gradeId = $user["GradeId"];
                    // var_dump($user);
                    $classResult = $classModel->getClassById($classId);
                    if(mysqli_num_rows($classResult) <= 0){
                        $error["classId"] = "ID lớp học không tồn tại.";
                    }
                    else{
                        $class = mysqli_fetch_assoc($classResult);
                        $password = $class["Password"];

                        $isCorrectGrade = $classModel->isCorrectGrade($classId,$gradeId);
                    
                        if($isCorrectGrade == false){
                            $error["classId"] = "Vui lòng chọn lớp đúng khối.";
                        }else{
                            $isRequested = $userClassModel->isRequestJoinClass($userId, $classId);
                            $isShowRequestForm = "true";
                            
                            if($isRequested == true){
                                $isShowRequestForm = "false";
                            }else{
                                $passwordInput = $_POST["PasswordJoinClass"];
                                
                                if(strtolower($passwordInput) != strtolower($password)){
                                    $error["password"] = "Mật khẩu nhập không chính xác.";
                                }
                            }
                        }
                    }
                    
                } catch (Exception $e) {
                    $error["classId"] = "Nhập số cho id lớp học.";
                }
            }

            if($error == []){
                $userClassResult = $userClassModel->insertUserClass($userId, $classId);
            }
        }

        $this->view("simple2", [
            "Page"                           => "simple2_student_joinWithId",
            "title"       	                 => "Join class with id",
            "menu"			                 => "simple2_student_menu",
            "error"			                 => $error,
            "isShowRequestForm"              => $isShowRequestForm
        ]);
    }

}?>