<?php
class Controller
{

    public function model($model)
    {
        require_once "./app/models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once "./app/views/" . $view . ".php";
    }

    public function clear($str)
    {
        return str_replace(array("'", '"'), array("&apos;", "&quot;"), trim($str));
    }

    public function is_Login()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
            return true;
        } else {
            return false;
        }
    }

    public function getUserId()
    {
        return @$_SESSION['userid'];
    }

    public function is_Admin()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['permission'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function is_Teacher()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['permission'] == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function is_Student()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['permission'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function redirect($target)
    {
        echo "<script>window.location='" . Config::$base_url . $target . "';</script>";
    }

    public function upload($tmp_name, $path, $size)
    {

        $types = array("png", "jpg", "jpeg");

        $type = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (in_array($type, $types)) {

            if ($size <= 5 * 1024 * 1024) {

                if (move_uploaded_file($tmp_name, $path)) {
                    return true;
                } else {
                    return "Upload không thành công.";
                }

            } else {
                return "Chỉ được upload ảnh không quá 5MB.";
            }

        } else {
            return "Chỉ được upload ảnh.";
        }
    }

    public function addSessionValue($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function getListNameGrade()
    {
        $gradeModel = $this->model("GradeModel");
        $result = $gradeModel->getListGrades();
        $grades = [];
        $index = 0;

        while ($row = mysqli_fetch_array($result)) {
            $grades[$index] = $row;
            $index++;
        }
        // print_r($grades);
        return $grades;
    }

    public function getListNameSubject()
    {
        $subjectModel = $this->model("SubjectModel");
        $result = $subjectModel->getListSubjects();
        $subjects = [];
        $index = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $subjects[$index] = $row;
            $index++;
        }

        return $subjects;
    }

    public function getListNameExamTime()
    {
        $examTimeModel = $this->model("ExamTimeModel");
        $result = $examTimeModel->getListExamTime();
        $examTimes = [];
        $index = 0;

        while ($row = mysqli_fetch_array($result)) {
            $examTimes[$index] = $row;
            $index++;
        }

        return $examTimes;
    }

}
