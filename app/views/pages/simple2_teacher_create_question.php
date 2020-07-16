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

                <?php if(isset($data["success"])){ ?>
                    <h3 style="color: green;text-align: center;"><?php echo $data["success"]; ?></h3>
                <?php } ?>

                <table cellpadding="0" cellspacing="0" style="width:100%" border="0" class="TBLCreate">
                    <tbody>
                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Khối (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <?php if(isset($data["errors"]["grade"])){ ?>
                                    <span style="color: red;"><?php echo $data["errors"]["grade"]; ?></span>
                                <?php } ?>
                                <input type="hidden" name="grade_name" />
                                <select id="gradeId" name="grade_id" class="form-control valid" aria-required="true" aria-invalid="false" >
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
                                <?php if(isset($data["errors"]["subject"])){ ?>
                                    <span style="color: red;"><?php echo $data["errors"]["subject"]; ?></span>
                                <?php } ?>
                                <input type="hidden" name="subject_id" />
                                <select id="subjectId" name="subjectId" class="form-control valid" aria-required="true" aria-invalid="false" >
                                    <option value="">Chọn môn</option>
                                </select>
                            </td>
                        </tr>

                        <tr>

                            <td class="TDCaption"> <span class="CaptionInputCSS">Chương (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <?php if(isset($data["errors"]["chapter"])){ ?>
                                    <span style="color: red;"><?php echo $data["errors"]["chapter"]; ?></span>
                                <?php } ?>
                                <input type="hidden" name="chapter_id" />
                                <select id="chapterId" name="chapterId" class="form-control valid" aria-required="true" aria-invalid="false" >
                                    <option value="">Chọn chương</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="TDCaption"> <span class="CaptionInputCSS">Bài (<span class="required" aria-required="true">*</span>)</span>
                            </td>
                            <td class="TDInput">
                                <?php if(isset($data["errors"]["lesson"])){ ?>
                                    <span style="color: red;"><?php echo $data["errors"]["lesson"]; ?></span>
                                <?php } ?>
                                <input type="hidden" name="lesson_id" />
                                <select id="lessonId" name="lessonId" class="form-control valid" aria-required="true" aria-invalid="false" >
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

                    <?php if(isset($data['errors']['number_of_questions'])){ ?>
                        <p style="color:red;text-align: center;"><?php echo $data['errors']['number_of_questions']; ?></p>
                    <?php } ?>

                    <?php if(isset($data['errors']['list_questions']) && $data['errors']['list_questions'] == true){ ?>
                        <p style="color:red;text-align: center;"><?php echo "Các vùng khoanh đỏ không được để trống !"; ?></p>
                    <?php } ?>


                </div>
                


            </div>
        </div>
    </section>

<input type="submit" name="complete_add" class="btn btn-primary cssPreview" value="Thêm vào bài">

<input type="hidden" name="number_of_questions" value="<?php if(isset($data["back_number_of_questions"])){ echo $data["back_number_of_questions"]; }else{ echo "0"; }; ?>">
</form>

<button class="btn btn-primary cssPreview" id="add_question">Thêm 1 câu hỏi</button>


<script type="text/javascript">
            $(document).ready(function () {

                <?php if(isset($data["back_number_of_questions"])){ ?>

                var question_count = <?php echo $data["back_number_of_questions"]; ?>;

                <?php }else{ ?>

                var question_count = 0;

                <?php } ?>

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

                    $("#chapterId").empty();
                    $("#chapterId").append(`<option value="">Chọn chương</option>`);
                    $("#lessonId").empty();
                    $("#lessonId").append(`<option value="">Chọn bài</option>`);
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

                    $("#lessonId").empty();
                    $("#lessonId").append(`<option value="">Chọn bài</option>`);
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

                    $("input[name='number_of_questions']").val(question_count);

                    createQuestionTemplate(question_count);
                });

                <?php

                function cleanContent($content){
                    return str_replace(array("\n", "\r"), '', str_replace("&quot;",'"',$content));
                }

                ?>

                <?php if(isset($data['back_list_questions'])){ ?>

                    <?php foreach($data['back_list_questions'] as $key => $value){

                        $params = "";

                        $params .= ($key+1).",";

                        $params .= "'".cleanContent($value->content)."'".",";

                        $params .= "'".cleanContent($value->list_answer[0]->content)."'".",";
                        $params .= "'".cleanContent($value->list_answer[1]->content)."'".",";
                        $params .= "'".cleanContent($value->list_answer[2]->content)."'".",";
                        $params .= "'".cleanContent($value->list_answer[3]->content)."'".",";


                        if($value->is_error == null)
                            $params .= 'null'.",";
                        else if($value->is_error == false)
                            $params .= 'false'.",";
                        else
                            $params .= 'true'.",";





                        for($i = 0; $i <= 3; $i ++){
                            
                            if($value->list_answer[$i]->is_error == null)
                                $params .= 'null'.",";
                            else if($value->list_answer[$i]->is_error == false)
                                $params .= 'false'.",";
                            else
                                $params .= 'true'.",";

                        }



                        if($value->is_have_answer_choose == null)
                            $params .= 'false'.",";
                        else if($value->is_have_answer_choose == false)
                            $params .= 'false'.",";
                        else
                            $params .= 'true'.",";





                        $answer_choosed = 'null';

                        for($i = 0; $i <= 3; $i++){
                            if($value->list_answer[$i]->is_correct == true){
                                $answer_choosed = $i+1;
                                break;
                            }
                        }

                        $params .= $answer_choosed;
                    ?>

                        setTimeout(function(){ 
                            createQuestionTemplate(<?php echo $params; ?>);
                        }, <?php echo $key*200; ?>);

                        

                    <?php } ?>

                <?php } ?>


                function createQuestionTemplate(pos, question_content = null, answ_1 = null, answ_2 = null, answ_3 = null, answ_4 = null, question_error = false, answ_1_error = false, answ_2_error = false, answ_3_error = false, answ_4_error = false, is_have_answer_choose = null, answer_choosed = null){
                    $("#area_of_questions").append(`

                        <div class="col-md-12 questionstyle">
                            <div class='`+((question_error == true)?"answer_error":'')+`'>
                                <h3>Câu `+pos+` : </h3>
                            
                                <textarea name="question_`+pos+`" id="question_`+pos+`" rows="10" cols="80">
                                    `+((question_content != null)?question_content:'')+`
                                </textarea>
                            </div>

                            `+((is_have_answer_choose == false)?"<p style='color:red;'> Vui lòng tích chọn đáp án đúng cho câu hỏi </p>":'')+`
                            
                            <div class="row">
                                <div class="col-md-3 `+((answ_1_error == true)?"answer_error":'')+`" style="margin-top: 10px;"><input type="radio" name="check_question_`+pos+`" value="1" `+((answer_choosed == 1)?"checked":'')+`> A . <textarea id="question_`+pos+`_answer_1" name="question_`+pos+`_answer_1" style="vertical-align: middle;" >`+((answ_1 != null)?answ_1:'')+`</textarea></div>
                                <div class="col-md-3 `+((answ_2_error == true)?"answer_error":'')+`" style="margin-top: 10px;"><input type="radio" name="check_question_`+pos+`" value="2" `+((answer_choosed == 2)?"checked":'')+`> B . <textarea id="question_`+pos+`_answer_2" name="question_`+pos+`_answer_2" style="vertical-align: middle;" >`+((answ_2 != null)?answ_2:'')+`</textarea></div>
                                <div class="col-md-3 `+((answ_3_error == true)?"answer_error":'')+`" style="margin-top: 10px;"><input type="radio" name="check_question_`+pos+`" value="3" `+((answer_choosed == 3)?"checked":'')+`> C . <textarea id="question_`+pos+`_answer_3" name="question_`+pos+`_answer_3" style="vertical-align: middle;" >`+((answ_3 != null)?answ_3:'')+`</textarea></div>
                                <div class="col-md-3 `+((answ_4_error == true)?"answer_error":'')+`" style="margin-top: 10px;"><input type="radio" name="check_question_`+pos+`" value="4" `+((answer_choosed == 4)?"checked":'')+`> D . <textarea id="question_`+pos+`_answer_4" name="question_`+pos+`_answer_4" style="vertical-align: middle;" >`+((answ_4 != null)?answ_4:'')+`</textarea></div>
                            </div>
                        </div>

                    `);

                    CKEDITOR.replace('question_'+pos);

                    CKEDITOR.replace('question_'+pos+'_answer_1', {
                        customConfig: 'answer_config.js'
                    });

                    CKEDITOR.replace('question_'+pos+'_answer_2', {
                        customConfig: 'answer_config.js'
                    });

                    CKEDITOR.replace('question_'+pos+'_answer_3', {
                        customConfig: 'answer_config.js'
                    });

                    CKEDITOR.replace('question_'+pos+'_answer_4', {
                        customConfig: 'answer_config.js'
                    });
                }


            // Load lại dữ liệu đã truyền 4 select đầu bằng value

            <?php if(isset($data['back_grade_id']) && $data['back_grade_id'] != ""){ ?>

            $("#gradeId option[value = <?php echo $data['back_grade_id']; ?>]").prop('selected',true).trigger('change');

            <?php } ?>


            <?php if(isset($data['back_subject_id']) && $data['back_subject_id'] != ""){ ?>

            var choose_subject = setInterval(function(){
                if($("#subjectId option[value = <?php echo $data['back_subject_id']; ?>]").length == 1){
                    $("#subjectId option[value = <?php echo $data['back_subject_id']; ?>]").prop('selected',true).trigger('change');
                    clearInterval(choose_subject);
                }
            }, 100);

            <?php } ?>


            <?php if(isset($data['back_chapter_id']) && $data['back_chapter_id'] != ""){ ?>

            var choose_chapter = setInterval(function(){
                if($("#chapterId option[value = <?php echo $data['back_chapter_id']; ?>]").length == 1){
                    $("#chapterId option[value = <?php echo $data['back_chapter_id']; ?>]").prop('selected',true).trigger('change');
                    clearInterval(choose_chapter);
                }
            }, 100);

            <?php } ?>



            <?php if(isset($data['back_lesson_id']) && $data['back_lesson_id'] != ""){ ?>

            var choose_lesson = setInterval(function(){
                if($("#lessonId option[value = <?php echo $data['back_lesson_id']; ?>]").length == 1){
                    $("#lessonId option[value = <?php echo $data['back_lesson_id']; ?>]").prop('selected',true).trigger('change');
                    clearInterval(choose_lesson);
                }
            }, 100);

            <?php } ?>

            

            


            });

            //showAlert({ 'content': 'Quý Thầy cô vui lòng nhập thời lượng làm bài', callBack: function () { $('#durationOfTime').focus(); } });
            
</script>

<script src="public/simple2/js/ckeditor/ckeditor.js"></script>

<style>

    .answer_error{
        border: 1px solid red;
    }
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
