<section id="inner-headline">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">TẠO CÂU HỎI</h2>
            </div>
        </div>
</section>
<form method="post" action="<?php echo Config::$base_url; ?>Teacher/createQuestion">
    <section id="content">
        <div class="row">
            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" style="width:100%" border="0" class="TBLCreate">
                    <tbody>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Khối (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="grade_name" />
                                <select id="gradeId" name="grade_id" class="form-control valid" aria-required="true" aria-invalid="false" required>
                                    <option value="">Chọn khối</option>

                                    <?php while ($row = mysqli_fetch_array($data["grades"])) { ?>

                                        <option value="<?php echo $row["GradeId"]; ?>"><?php echo $row["Name"]; ?></option>

                                    <?php } ?>

                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Môn học (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="subject_id" />
                                <select id="subjectId" name="subjectId" class="form-control valid" aria-required="true" aria-invalid="false" required>
                                    <option value="">Chọn môn</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Chương (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="chapter_id" />
                                <select id="chapterId" name="chapterId" class="form-control valid" aria-required="true" aria-invalid="false" required>
                                    <option value="">Chọn chương</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Bài (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <input type="hidden" name="lesson_id" />
                                <select id="lessonId" name="lessonId" class="form-control valid" aria-required="true" aria-invalid="false" required>
                                    <option value="">Chọn bài</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS"></span>
                            </td>
                            <td class="TDInput" style="padding-top:20px">
                            </td>
                        </tr>
                    </tbody>
                </table>


                <hr>

                <div class="row" id="area_of_questions">


                </div>
                


            </div>
        </div>
    </section>

<input type="submit" name="complete_add" class="btn btn-primary cssPreview" value="Thêm vào bài">

</form>

<button class="btn btn-primary cssPreview" id="add_question">Thêm 1 câu hỏi</button>


<script type="text/javascript">
            $(document).ready(function () {


                var question_count = 0;

                $("#gradeId").change(function(){

                    $.getJSON("<?php echo Config::$base_url; ?>Teacher/getSubjectsOfGrade/" + $(this).val(), function(result){

                        //console.log(result);

                        $("#subjectId").empty();
                        $("#subjectId").append(`<option value="">Chọn môn</option>`);

                        $.each(result, function(i, field){
                          //$("div").append(field + " ");
                          $("#subjectId").append(`<option value="`+field.subject_id+`">`+field.subject_name+`</option>`);
                        });

                    });
                });


                $("#subjectId").change(function(){

                    $.getJSON("<?php echo Config::$base_url; ?>Teacher/getChapterOfSubjectGrade/" + $("#gradeId").val() + "/" + $(this).val(), function(result){

                        //console.log(result);

                        $("#chapterId").empty();
                        $("#chapterId").append(`<option value="">Chọn chương</option>`);

                        $.each(result, function(i, field){
                          //$("div").append(field + " ");
                          $("#chapterId").append(`<option value="`+field.chapter_id+`">`+field.chapter_name+`</option>`);
                        });

                    });
                });


                $("#chapterId").change(function(){

                    $.getJSON("<?php echo Config::$base_url; ?>Teacher/getLessonOfChapter/" + $(this).val(), function(result){

                        //console.log(result);

                        $("#lessonId").empty();
                        $("#lessonId").append(`<option value="">Chọn bài</option>`);

                        $.each(result, function(i, field){
                          //$("div").append(field + " ");
                          $("#lessonId").append(`<option value="`+field.lesson_id+`">`+field.lesson_name+`</option>`);
                        });

                    });
                });


            
                $("#add_question").click(function(){

                    question_count++;

                    $("#area_of_questions").append(`

                        <div class="col-md-12 questionstyle">
                            <h3>Câu `+question_count+` : </h3>
                            <textarea name="question_`+question_count+`" id="question_`+question_count+`" rows="10" cols="80">
                                
                            </textarea>

                            <div class="row">
                                <div class="col-md-3" style="margin-top: 10px;"><input type="radio" name="check_question_`+question_count+`" value="1" required> A . <textarea id="question_`+question_count+`_answer_1" name="question_`+question_count+`_answer_1" style="vertical-align: middle;"></textarea></div>
                                <div class="col-md-3" style="margin-top: 10px;"><input type="radio" name="check_question_`+question_count+`" value="2" required> B . <textarea id="question_`+question_count+`_answer_2" name="question_`+question_count+`_answer_2" style="vertical-align: middle;"></textarea></div>
                                <div class="col-md-3" style="margin-top: 10px;"><input type="radio" name="check_question_`+question_count+`" value="3" required> C . <textarea id="question_`+question_count+`_answer_3" name="question_`+question_count+`" style="vertical-align: middle;"></textarea></div>
                                <div class="col-md-3" style="margin-top: 10px;"><input type="radio" name="check_question_`+question_count+`" value="4" required> D . <textarea id="question_`+question_count+`_answer_4" name="question_`+question_count+`_answer_4" style="vertical-align: middle;"></textarea></div>
                            </div>
                        </div>

                    `);

                    CKEDITOR.replace('question_'+question_count);

                    CKEDITOR.replace('question_'+question_count+"_answer_1", {
                        customConfig: 'answer_config.js'
                    });
                    CKEDITOR.replace('question_'+question_count+"_answer_2", {
                        customConfig: 'answer_config.js'
                    });
                    CKEDITOR.replace('question_'+question_count+"_answer_3", {
                        customConfig: 'answer_config.js'
                    });
                    CKEDITOR.replace('question_'+question_count+"_answer_4", {
                        customConfig: 'answer_config.js'
                    });
                });

            });

            //showAlert({ 'content': 'Quý Thầy cô vui lòng nhập thời lượng làm bài', callBack: function () { $('#durationOfTime').focus(); } });
            
</script>

<script src="public/simple2/js/ckeditor/ckeditor.js"></script>

<style>


    .questionstyle h3{

        margin-top:0px;
        margin-bottom:0px;
        padding:10px;
        color: white;
        background-color: #3F51B5;


    }

    .required {
        color: red;
    }

    td {
        padding-top: 3px;
    }

    .TDCaption {
        text-align: right;
        padding-right: 10px;
        width: 100px;
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
