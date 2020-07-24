<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">TẠO ĐỀ THI DÙNG MA TRẬN</h2>
            </div>
        </div>
    </div>
</section>
<form method="post" action="<?php echo Config::$base_url; ?>Teacher/createExamMatrixStep2">
    <section id="content">
        <div class="container">
            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" style="width:100%" border="0" class="TBLCreate">
                    <tbody>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Tên (<span class="required"
                                        aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <ul class="ul-examtype">
                                    <li class="li-examtype">
                                        <input class="form-control" style="display:inline-block; width:350px"
                                            type="text" id="title" name="exam_name" required value=""
                                            placeholder="Kiểm tra 15 phút môn toán lớp 12 chương hàm số">
                                        <p style="padding:0px; margin:0px; display:inline-block">Số câu hỏi (<span
                                                class="required" aria-required="true">*</span>):
                                            <input class="form-control valid" style="display:inline-block; width:100px"
                                                maxlength="3" max="100" type="number" id="examNumOfQuestion"
                                                name="examNumOfQuestion" value="10" aria-required="true"
                                                aria-invalid="false" required>Thời lượng (<span class="required"
                                                aria-required="true">*</span>):
                                            <input type="hidden" name="exam_time_name">
                                            <select name="durationOfTime" required>
                                                <option value="">Chọn thời gian</option>
                                                <?php while ($row = mysqli_fetch_array($data["exam_times"])) { ?>

                                                <option value="<?php echo $row["ExamTimeId"]; ?>">
                                                    <?php echo $row["Name"]; ?></option>

                                                <?php } ?>

                                            </select>

                                        </p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Thời gian bắt đầu (<span class="required"
                                        aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="datetime-local" name="datetimeStart" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Khối (<span class="required"
                                        aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="grade_name" />
                                <select id="gradeId" name="gradeId" class="form-control valid"
                                    onchange="$('#subjectId').val('');" aria-required="true" aria-invalid="false"
                                    required>
                                    <option value="">Chọn khối</option>

                                    <?php while ($row = mysqli_fetch_array($data["grades"])) { ?>

                                    <option value="<?php echo $row["GradeId"]; ?>"><?php echo $row["Name"]; ?></option>

                                    <?php } ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Môn học (<span class="required"
                                        aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="subject_name" />
                                <select id="subjectId" name="subjectId" class="form-control valid" aria-required="true"
                                    aria-invalid="false" required>
                                    <option value="">Chọn môn</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS"></span>
                            </td>
                            <td class="TDInput" style="padding-top:20px">
                                <input class="btn btn-primary cssPreview" type="submit" value="Tiếp tục" name="step1">
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
$(document).ready(function() {


    $("#gradeId").change(function() {

        $.getJSON("<?php echo Config::$base_url; ?>Teacher/getSubjectsOfGrade/" + $(this).val(),
            function(result) {

                //console.log(result);

                $("#subjectId").empty();
                $("#subjectId").append(`<option value="">Chọn môn</option>`);

                $.each(result, function(i, field) {
                    //$("div").append(field + " ");
                    $("#subjectId").append(`<option value="` + field.subject_id + `">` +
                        field.subject_name + `</option>`);
                });

            }).always(function(){

                $("#overlay").fadeOut(300);
                
            });

        $("input[name = 'grade_name']").val($("#gradeId option:selected").text());

    });


    $("#subjectId").change(function() {

        $("input[name = 'subject_name']").val($("#subjectId option:selected").text());

    });

    $("select[name = 'durationOfTime']").change(function() {

        $("input[name = 'exam_time_name']").val($("select[name = 'durationOfTime'] option:selected")
            .text());

    });

    

});

//showAlert({ 'content': 'Quý Thầy cô vui lòng nhập thời lượng làm bài', callBack: function () { $('#durationOfTime').focus(); } });
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

.td-q-r {}

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