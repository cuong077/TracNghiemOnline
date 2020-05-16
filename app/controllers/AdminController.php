<?php

class Admin extends Controller{

	//them mon hoc
	function addSubject($subjectName){
	  $error = [];
	  $success = "";

	  if (!$this->is_Admin()) {
  		$this->redirect("Home");
  	  }
  	  else {
  		$subjectModel = $this->model("SubjectModel");

  		//check khong ton tai bai thi
  		if ($subjectModel->existSubjectWithName($subjectName)) {
  		  if ($subjectModel->addSubject($subjectName)) {
  			$success="Thêm môn học thành công.";
  		  }
  		  else {
  			$error["subject"] = "Không thể thêm môn học vào database.";
  		  }
  		}
  		else {
  		  $error["subject"] = "Đã tồn tại môn học.";
  		}
	  }

	  $this->view("", [
		"Page"  			=> "",
		"title" 			=> "",
		"error"				=> $error,
		"success"			=> $success
	  ]);
	}

	//xoa mon hoc voi id
	function deleteSubject($subjectId){
	  $error = [];
	  $success = "";

	  if (!$this->is_Admin()) {
		$this->redirect("Dashboard");
	  }
	  else {
  		$subjectModel = $this->model("SubjectModel");

  		//check khong ton tai bai thi
  		if ($subjectModel->existSubjectWithId($subjectId)) {
  		  if ($subjectModel->deleteSubject($subjectId)) {
  			  $success="Xóa môn học thành công.";
  		  }
  		  else {
  			  $error["subject"] = "Không thể  xóa môn học trong database.";
  		  }
  		}
  		else {
  		  $error["subject"] = "Không tồn tại môn học.";
  		}
	  }

	  $this->view("", [
		"Page"  			=> "",
		"title" 			=> "",
		"error"				=> $error,
		"success"			=> $success
	  ]);
	}

	//sua mon hoc voi id
	function editSubject($subjectId, $subjectName){
	  $error = [];
	  $success = "";

	  if (!$this->is_Admin()) {
		$this->redirect("Dashboard");
	  }
	  else {
		$subjectModel = $this->model("SubjectModel");

		//check khong ton tai bai thi
		if ($subjectModel->existSubjectWithId($subjectId)) {
		  if ($subjectModel->updateSubject($subjectId, $subjectName)) {
			$success="Chỉnh sửa môn học thành công.";
		  }
		  else {
			$error["subject"] = "Không thể  chỉnh sửa môn học trong database.";
		  }
		}
		else {
		  $error["subject"] = "Không tồn tại môn học.";
		}
	  }

	  $this->view("", [
		"Page"  			=> "",
		"title" 			=> "",
		"error"				=> $error,
		"success"			=> $success
	  ]);
	}

  //lay toan bo mon hoc
	function getSubjects(){
	  $error = [];
	  $success = "";

	  if (!$this->is_Admin()) {
		$this->redirect("Dashboard");
	  }
	  else {
		$subjectModel = $this->model("SubjectModel");

		$subjects = $subjectModel->getSubjects();
		// while ($row = mysqli_fetch_array($subjects)) {
		//
		// }
	  }

	  $this->view("", [
		"Page"  			=> "",
		"title" 			=> "",
		"subjects"  	=> $subjects,
		"error"				=> $error,
		"success"			=> $success
	  ]);
	}

	public function process(){

	}

  //them khoi hoc
  function addGrade($gradeName){
    $error = [];
    $success = "";

    if (!$this->is_Admin()) {
      $this->redirect("Dashboard");
    }
    else {
      $gradeModel = $this->model("GradeModel");

      //check khong ton tai bai thi
      if ($gradeModel->existGradeWithName($gradeName)) {
        if ($gradeModel->addGrade($gradeName)) {
          $success="Thêm khối lớp học thành công.";
        }
        else {
          $error["grade"] = "Không thể thêm khối lớp học vào database.";
        }
      }
      else {
        $error["grade"] = "Đã tồn tại khối lớp học.";
      }
    }
    //check khong ton tai bai thi

    $this->view("", [
    "Page"  			=> "",
    "title" 			=> "",
    "error"				=> $error,
    "success"			=> $success
    ]);
  }

  //xoa mon hoc voi id
  function deleteGrade($gradeId){
    $error = [];
    $success = "";

    if (!$this->is_Admin()) {
      $this->redirect("Dashboard");
    }
    else {
      $gradeModel = $this->model("GradeModel");

      //check khong ton tai bai thi
      if ($gradeModel->existGradeWithId($gradeId)) {
        if ($subjectModel->deleteGrade($gradeId)) {
          $success="Xóa khối lớp học thành công.";
        }
        else {
          $error["grade"] = "Không thể  xóa khối lớp học trong database.";
        }
      }
      else {
        $error["grade"] = "Không tồn tại khối lớp học.";
      }
    }

    $this->view("", [
      "Page"  			=> "",
      "title" 			=> "",
      "error"				=> $error,
      "success"			=> $success
    ]);
  }

  //sua mon hoc voi id
  function editGrade($gradeId, $gradeName){
    $error = [];
    $success = "";

    if (!$this->is_Admin()) {
      $this->redirect("Dashboard");
    }
    else {
      $gradeModel = $this->model("GradeModel");

    //check khong ton tai bai thi
    if ($gradeModel->existGradeWithId($gradeId)) {
      if ($gradeModel->updateGrade($gradeId, $gradeName)) {
        $success="Chỉnh sửa môn học thành công.";
      }
      else {
        $error["subject"] = "Không thể  chỉnh sửa môn học trong database.";
      }
    }
      else {
        $error["subject"] = "Không tồn tại môn học.";
      }
    }

    $this->view("", [
      "Page"  			=> "",
      "title" 			=> "",
      "error"				=> $error,
      "success"			=> $success
    ]);
  }

	//lay toan bo khoi lop hoc
	function getGrades(){
	  $error = [];
	  $success = "";

	  if (!$this->is_Admin()) {
			$this->redirect("Dashboard");
	  }
	  else {
			$gradeModel = $this->model("GradeModel");

			$grades = $gradeModel->getGrades();
		// while ($row = mysqli_fetch_array($subjects)) {
		//
		// }
	  }

	  $this->view("", [
			"Page"  			=> "",
			"title" 			=> "",
			"subjects"  	=> $subjects,
			"error"				=> $error,
			"success"			=> $success
	  ]);
	}
}
?>
