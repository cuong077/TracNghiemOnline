<?php

class Home extends Controller{

    public function index(){
        //liệt kê tất cả các khối, môn để filter; bài thi để lựa chọn
        $grades = $this->getListNameGrade();
        $subjects = $this->getListNameSubject();
        $exams = $this->getExamsToView();

        $this->view("simple",[
            "Page"          => "simple_home",
            "title"         => "Trang chủ",
            "grades"        => $grades,
            "subjects"      => $subjects,
            "exams"         => $exams
        ]);

    }

    private function getExamsToView(){
        $exams = [];
        //$result = $this->getListExams();
        $examModel = $this->model("ExamsModel");
        $result = $examModel->getListExams();
        $index = 0;

        while ($row = mysqli_fetch_array($result)) {
            $exams[$index] = $row;
        }

        return $exams;
    }

}
?>
