<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">TẠO ĐỀ THI</h2>
            </div>
        </div>
    </div>
</section>
<form method="post" action="https://www.789.vn/bo-de-v2.html" id="frmMain" name="frmMain" novalidate="novalidate">
    <section id="content">
        <div class="container">
            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" style="width:100%" border="0" class="TBLCreate">
                    <tbody>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Tên (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <ul class="ul-examtype">
                                    <li class="li-examtype">
                                        <input class="form-control" style="display:inline-block; width:350px" type="text" id="title" name="title" value="" placeholder="Kiểm tra 15 phút môn toán lớp 12 chương hàm số">
                                        <p style="padding:0px; margin:0px; display:inline-block">Số câu hỏi (<span class="required" aria-required="true">*</span>):
                                            <input class="form-control valid" style="display:inline-block; width:100px" maxlength="3" max="100" type="number" id="examNumOfQuestion" name="examNumOfQuestion" value="10" aria-required="true" aria-invalid="false">Thời lượng (<span class="required" aria-required="true">*</span>):

                                            <select name="durationOfTime">
                                                <option>Chọn thời gian</option>
                                                <?php while ($row = mysqli_fetch_array($data["exam_time"])) { ?>

                                                    <option value=""><?php echo $row["Name"]; ?></option>

                                                <?php } ?>
                                                
                                            </select>

                                        </p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Khối (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <select id="classId" name="classId" class="form-control valid" onchange="$('#subjectId').val('');" aria-required="true" aria-invalid="false">
                                    <option value="">Chọn khối</option>

                                    <?php while ($row = mysqli_fetch_array($data["grades"])) { ?>

                                        <option value=""><?php echo $row["Name"]; ?></option>

                                    <?php } ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Môn học (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <select id="subjectId" name="subjectId" class="form-control valid" onchange="getChapter('https://www.789.vn/Api/GetSelectOption', $('#classId').val(), $('#subjectId').val(), '#chapterId')" aria-required="true" aria-invalid="false">
                                    <option value="">Chọn môn</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS"></span>
                            </td>
                            <td class="TDInput" style="padding-top:20px">
                                <a href="Teacher/createExamManualStep2"><button class="btn btn-primary cssPreview" type="button">Tiếp tục</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </section>
</form>


<script type="text/javascript">
            $(document).ready(function () {
                $('#aViewMoreTruoc').hide();
                $('#aViewMore').hide();
                $('#aPreview').hide();
                startValidate();
                $('#btnTopSave').prop('disabled', true);
                if(0 > 0)
                {
                    //$('#classId').prop("disabled", true);
                    //$('#subjectId').prop("disabled", true);
                    //$('#ofme').prop("disabled", true);
                    //getChapter('https://www.789.vn/Api/GetSelectOption', $('#subjectId').val(), '#chapterId');
                    //$('#subjectId').val(0);
                    getChapter('https://www.789.vn/Api/GetSelectOption', $('#classId').val(), $('#subjectId').val(), '#chapterId');
                    generateQuestionForEdit('https://www.789.vn/Api/GenerateQuestionV2ForEdit', 0, '#questionRegion');
                }
            });
            function ennableSave()
            {
                var examNumOfQuestion = $('#examNumOfQuestion').val();
                if (totalQuestion == parseInt(examNumOfQuestion))
                {
                    $('#btnTopSave').prop('disabled', false);
                    $('#aPreview').show();
                } else {
                    $('#btnTopSave').prop('disabled', true);
                    $('#aPreview').hide();
                }
            }
            function postForm() {
                var title = $('#title').val();
                var examNumOfQuestion = $('#examNumOfQuestion').val();
                var durationOfTime = $('#durationOfTime').val();
                var classId = $('#classId').val();
                var subjectId = $('#subjectId').val();
                var chapterId = $('#chapterId').val();
        
                if (empty(title)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập tên để sử dụng cho lần sau<br>Ví dụ: Đề thi thử 45 phút, lớp 12, môn toán, 30 câu', callBack: function () { $('#title').focus(); } });
                    $('#title').focus();
                    return false;
                }
                if (empty(examNumOfQuestion) || parseInt(examNumOfQuestion) <= 0 || parseInt(examNumOfQuestion) > 60) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập số tổng câu của đề > 0 và <= 60 câu', callBack: function () { $('#examNumOfQuestion').focus(); } });
                    $('#examNumOfQuestion').focus();
                    return false;
                }
                if (empty(durationOfTime) || parseFloat(durationOfTime) <= 0) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập thời lượng làm bài', callBack: function () { $('#durationOfTime').focus(); } });
                    $('#durationOfTime').focus();
                    return false;
                }
                if (empty(classId)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng chọn lớp học', callBack: function () { $('#classId').focus(); } });
                    $('#classId').focus();
                    return false;
                }
                if (empty(subjectId)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng chọn môn học', callBack: function () { $('#subjectId').focus(); } });
                    $('#subjectId').focus();
                    return false;
                }
                if (totalQuestion < examNumOfQuestion) {
                    showAlert({ 'content': `Tổng số câu đã chọn ${totalQuestion} < tổng số câu của bài thi ${examNumOfQuestion}`, callBack: function () { $('#examNumOfQuestion').focus(); } });
                    $('#examNumOfQuestion').focus();
                    return false;
                }
                showAlert({
                    'content': 'Giáo viên vui lòng kiểm tra các câu hỏi trước khi lưu đề thi. Để đảm bảo đề thi không có sai sót, giáo viên hãy đóng vai là học sinh <a href="https://www.789.vn/lop-hoc-da-tham-gia.html" target="_blank">để làm bài</a>',
                    ok: 'Lưu đề thi',
                    callBack: function () { approveSaveExam(); }
                });
        
            }
            function approveSaveExam() {
                $.fancybox.close();
                $("#frmMain").submit();
            }
            function startValidate() {
                $("#frmMain").validate({
                    rules: {
                        title: { required: true },
                        examNumOfQuestion: { required: true },
                        durationOfTime: { required: true },
                        ofme: { required: true },
                        classId: { required: true },
                        subjectId: { required: true },
                        //chapterId: { required: true },
                        //lessionId: { required: true }
                    },
                    messages: {
                        title: "*",
                        examNumOfQuestion: "*",
                        durationOfTime: "*",
                        ofme: "*",
                        classId: "*",
                        subjectId: "*",
                        //chapterId: "*",
                        //lessionId: "*"
                    },
                    errorPlacement: function () {
                        return true;  // suppresses error message text
                    }
                });
            }
            function disable(value)
            {
                $('#classId').prop("disabled", value);
                $('#subjectId').prop("disabled", value);
                $('#ofme').prop("disabled", value);
            }
</script>

<style>
    .required {
        color: red;
    }

    td {
        padding-top: 3px;
    }

    .TDCaption {
        text-align: right;
        padding-right: 10px;
    }

    .td-q-l {
        max-width: 570px !important;
    }

    .td-q-r {
    }

    .li-question {
        margin: 2px;
        border: 1px solid #c7c4c4;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
    }

    #questionRegion {
        list-style: none;
        padding: 0px;
        margin: 0px;
        height: 600px;
        overflow-y: scroll;
        overflow-x: no-display;
        max-width: 570px !important;
    }

    #questionRegionSelected {
        list-style: none;
        padding: 0px;
        margin: 0px;
        height: 600px;
        overflow-y: scroll;
        overflow-x: no-display;
    }

    .q-selected {
        border: 1px solid #ff0000;
    }
</style>
