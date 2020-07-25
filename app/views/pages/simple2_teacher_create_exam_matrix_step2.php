
<div class="col-lg-11 col-md-10 col-sm-9 col-xs-8 bhoechie-tab bhoechie-tab-3">
    <!-- flight section -->
    <div class="bhoechie-tab-content bhoechie-tab-content-3 active" divsubjectid="1">
        <h2 style="margin-top: 0;color:#3F51B5; text-align: center;"><?php echo $data["subject_name"]." - ".$data["grade_name"]." - ".$data["exam_time_name"]." - <span style='color:red;'>".$data["number_of_questions"]." câu</span>";  ?></h2>
        <h3 style="margin-top: 0;color:#55518a">Chương</h3>


        <input type="hidden" name="exam_name" value="<?php echo $data["exam_name"]; ?>" />
        <input type="hidden" name="exam_description" value="<?php echo $data["subject_name"]." - ".$data["grade_name"]." - ".$data["exam_time_name"]; ?>" />
        <input type="hidden" name="exam_amount_of_question" value="<?php echo $data["number_of_questions"]; ?>" />
        <input type="hidden" name="exam_time_start" value="<?php echo $data["exam_datetime_start"]; ?>" />
        <input type="hidden" name="exam_time_id" value="<?php echo $data["exam_time_id"]; ?>" />




        <?php if(count($data["chapters_and_lessons"]) <= 0){ ?>

        <p style="color: red;">Không tồn tại chương và bài học nào !</p>

        <?php }else{ ?>

        <ul class="ul-class" style="margin-left:-40px;">

            <?php 

                foreach ($data["chapters_and_lessons"] as $key_chapter => $chapters_and_lesson){

            ?>
            <li class="list-style-none"> <i id="i_<?php echo $key_chapter; ?>" class="c789icon chapter-input-3-1-icon glyphicon glyphicon-plus" onclick="iconClick('#i_<?php echo $key_chapter; ?>', '#li-chapter-<?php echo $key_chapter; ?>','#chapter_<?php echo $chapters_and_lesson->chapter_id; ?>')">&nbsp;</i>
                <span class="cpointer chapter-title" onclick="iconClick('#i_<?php echo $key_chapter; ?>', '#li-chapter-<?php echo $key_chapter; ?>', '#chapter_3_1_2')"><?php echo $chapters_and_lesson->chapter_name; ?></span>


                <input style="width: 50px;text-align: center;" class="chapter_checkbox" style=""  max="100" type="number" data-id="1" data-title="Mũ và Logarit" name="chapter_<?php echo $chapters_and_lesson->chapter_id; ?>" value="">

            </li>


            <li class="list-style-none detail-region-css chapter-input-3-1-detail" style="display: none;" id="li-chapter-<?php echo $key_chapter; ?>">
                <ul class="ul-class" style="margin:6px;margin-left:0px;border: 1px solid #ccc; padding-bottom:2px;">

                    <li class="list-style-none">
                        <h3 style="margin-top: 0;color:#3F51B5; margin-bottom:0px;">Bài</h3>
                    </li>

                    <?php

                        foreach ($chapters_and_lesson->list_lesson as $key_lesson => $lesson) {
                    ?>

                    <li class="list-style-none"> <i id="i_1_6" class="c789icon glyphicon glyphicon-plus chapter-input-3-1-1-icon">&nbsp;</i>
                        <span class="cpointer lession-title"><?php echo $lesson->lesson_name; ?></span>
                        <input style="width: 50px;text-align: center;" class="" style=""  type="number" data-id="6" data-title="Tính đơn điệu của hàm số khi biết công thức f(x), f'(x)" name="lesson[]" value="" id="lesson_<?php echo $lesson->lesson_id; ?>">

                    </li>

                    <?php

                        }

                    ?>


                </ul>
            </li>


            <?php
                }
            ?>
        </ul>

        <?php } ?>
        <button class="btn btn-primary cssPreview" type="button" id="loadQuestion">Tải câu hỏi ngẫu nhiên</button>

        <button class="btn btn-primary cssPreview" type="button" id="createExam">Tạo đề thi</button>


    </div>
</div>



<table style="width: 100%;margin-bottom: 50px;">
    <tbody>
        <tr>
            <td class="col-lg-12">
                <h4 style="width:100%; min-width:520px; margin-bottom:0px;">
                                        Tổng số câu tìm được: <span id="totalSearch">0</span> câu
                                        <a id="aViewMoreTruoc" href="javascript:void(0)" onclick="getMore(1);" class="btn btn-primary" style="display: none;"> &lt;&lt; Xem trước </a>
                                        <a id="aViewMore" href="javascript:void(0)" onclick="getMore(2);" class="btn btn-primary" style="display: none;"> &gt;&gt; Xem sau </a>
                                        
                                    </h4>
                <span style="color:red; font-style:italic;">Nếu thấy các câu hỏi phù hợp thì chỉ cần nhấn tạo đề (<strong> nếu thấy chưa phù hợp thì nhấn lại tải câu hỏi ngẫu nhiên ! </strong>)</span>
            </td>
        </tr>
        <tr>
            <td class="col-lg-12">
                <ul id="questionRegion">
                </ul>
            </td>
        </tr>
    </tbody>
</table>


<script>

        /*
            -- My team code
        */

        
        

        $("#loadQuestion").click(function(){

            var number_of_questions = <?php echo $data["number_of_questions"]; ?>;

            $("#questionRegion").empty();

            //chuyển dữ liệu vào biến từ DOM

            var chapters = [];
            var chapters_dom = $("input[name ^= 'chapter_']");

            for(var i = 0; i < chapters_dom.length; i++){

                var chapter_dom = $(chapters_dom[i]);

                var _chapter = { 
                    id : parseInt(chapter_dom.attr("name").replace("chapter_", "")),
                    name : chapter_dom.siblings("span").text(),
                    num_of_ques : chapter_dom.val(),
                    list_lesson : [],
                    is_have_lesson_fill : false
                }

                var lessons = [];
                var lessons_dom = chapter_dom.parent("li").next("li").find("input[id ^= 'lesson_']");

                for(var j = 0; j < lessons_dom.length; j++){

                    var lesson_dom = $(lessons_dom[j]);
                    var _lesson = { 
                        id : parseInt(lesson_dom.attr("id").replace("lesson_", "")),
                        name : lesson_dom.siblings("span").text(),
                        num_of_ques : lesson_dom.val()
                    }
                    _chapter.list_lesson.push(_lesson);

                }

                chapters.push(_chapter);

            }




            //Xử lí logic kiểm tra xem người dùng nhập đúng hay không?
            //1 . Tổng câu hỏi điền phải đúng bằng số câu hỏi của đề
            //2 . Nếu điền vào bài thì phải điền vào chương sao cho phù hợp

            var total_question_fill = 0;

            for(var i = 0; i < chapters.length; i++){

                var total_question_of_all_lesson_fill = 0;


                var total_question_lesson_of_current_chapter = 0;

                for(var j = 0; j < chapters[i].list_lesson.length; j++){
                    if(chapters[i].list_lesson[j].num_of_ques != "")
                        total_question_lesson_of_current_chapter += parseInt(chapters[i].list_lesson[j].num_of_ques);
                }

                if(total_question_lesson_of_current_chapter > 0)
                    chapters[i].is_have_lesson_fill = true;

                if(chapters[i].num_of_ques == ""){
                    continue;
                }

                if(parseInt(chapters[i].num_of_ques) != total_question_lesson_of_current_chapter && total_question_lesson_of_current_chapter != 0){
                     showAlert({ 
                        'content': 'Nếu điền số câu hỏi cho bài thì tổng số câu hỏi của bài phải bằng số câu hỏi của chương <span style="color:red;">(' + chapters[i].name + ')</span>'});

                     $("input[name = 'chapter_"+ chapters[i].id +"']").focus();
                    return;
                }


                total_question_fill += parseInt(chapters[i].num_of_ques);

            }

            if(total_question_fill != number_of_questions){
                showAlert({'content': 'Số câu hỏi điền vào phải bằng với số câu hỏi của đề.'});
                return;
            }


            //lọc lại data để truyền lên server lấy câu hỏi

            var data = [];

            for(var i = 0; i < chapters.length; i++){


                if(chapters[i].is_have_lesson_fill == true){//is lessons

                    for (var j = 0; j < chapters[i].list_lesson.length; j++) {
                        if(chapters[i].list_lesson[j].num_of_ques != ""){
                            var item = {

                                is_chapter : false,
                                id : chapters[i].list_lesson[j].id,
                                name : chapters[i].list_lesson[j].name,
                                limit : parseInt(chapters[i].list_lesson[j].num_of_ques)

                            };
                            data.push(item);

                        }
                    }

                }else{ //is chapter 

                    if(chapters[i].num_of_ques != ""){

                        var item = {

                            is_chapter : true,
                            id : chapters[i].id,
                            name : chapters[i].name,
                            limit : parseInt(chapters[i].num_of_ques)

                        };

                        data.push(item);

                    }

                }

                
            } 
            
            //console.log(data);

            $.ajax({
                url: "<?php echo Config::$base_url; ?>Teacher/getListQuestionMatrix",
                type: 'post',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (result) {

                    $("#overlay").fadeOut(300);　

                    if(result.error == true){
                        showAlert({'content': result.error_message});
                        return;
                    }

                    var data = result.list_question;

                    $("#totalSearch").text(data.length);

                    for (var i = 0; i < data.length; i++) {
                        createQuestionTemplate(data[i].question_id, data[i].content, data[i].breadcrum, data[i].list_answer[0].content, data[i].list_answer[1].content, data[i].list_answer[2].content, data[i].list_answer[3].content);
                    }

                    
                }
                
            });


            





            //console.log(chapters);
            /*

            removeAllRight();

            var searchLessonIDs = $("input[name = 'lesson[]']:checked").map(function(){
                return $(this).val();
            }).toArray();

            var data = {
                user_id : <?php echo $this->getUserId(); ?>,
                list_lesson : searchLessonIDs
            };



            
            

            */
        });


        $(".chapter_checkbox").click(function(){

            if($(this).is(":checked") == true){
                $(this).parent("li").next("li").find("input[type = 'checkbox']").prop('checked', true);
            }else{
                $(this).parent("li").next("li").find("input[type = 'checkbox']").prop('checked', false);
            }

        });

        $("#createExam").click(function(){

            var data = buildData();

            if(data.list_question_id.length != data.exam_amount_of_question){
                showAlert({ 'content': 'Phải chọn đúng số lượng câu hỏi. Nếu chưa có câu hỏi giáo viên vui lòng thêm câu hỏi vào các bài học sau đó quay lại tạo đề !'});
                return;
            }

            $.ajax({

                url: "<?php echo Config::$base_url; ?>Teacher/createExam",
                type: 'post',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (data) {
                    $("#overlay").fadeOut(300);
                    
                    if(data.status == "success"){
                        showAlert({ 'content': 'Đã tạo thành công !'});
                    }else{
                        showAlert({ 'content': 'Tạo thật bại !'});
                    }
                    
                }
                
            });
        });



        function createQuestionTemplate(question_id, question_content, breadcrumb, answer_1, answer_2, answer_3, answer_4){

            $("#questionRegion").append(`

                <li class="li-question" id="li_`+ question_id +`" data-id="`+ question_id +`">
                        <h4>`+ breadcrumb +`</h4>
                        `+ question_content +`
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        `+ answer_1 +`
                                    </td>
                                    <td class="td-a">
                                        `+ answer_2 +`
                                    </td>
                                    <td class="td-a">
                                        `+ answer_3 +`
                                    </td>
                                    <td class="td-a">
                                        `+ answer_4 +`
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input name='questions[]' type="hidden" value='`+ question_id +`' />
                    </li>
                    <li style="text-align: right;">
                        <a href="#"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>

            `);
        }


        function buildData(){

            var data = {};

            data.exam_name = $("input[name = 'exam_name']").val();
            data.exam_description = $("input[name = 'exam_description']").val();
            data.exam_amount_of_question = $("input[name = 'exam_amount_of_question']").val();
            data.exam_time_start = $("input[name = 'exam_time_start']").val();
            data.exam_time_id = $("input[name = 'exam_time_id']").val();

            data.list_question_id = $("input[name = 'questions[]']").map(function(){
                return $(this).val();
            }).toArray();

            return data;
        }


       
</script>


<script language="javascript">
    $(document).ready(function () {
                        $("#btnLoginQuickLogin").fancybox({
                            maxWidth: 800,
                            maxHeight: 600,
                            fitToView: false,
                            width: '300px',
                            height: '450px',
                            autoSize: true,
                            //closeClick: false,
                            openEffect: 'none',
                            //closeEffect: 'none',
                            'transitionIn': 'elastic',
                            'transitionOut': 'elastic',
                            'speedIn': 600,
                            'speedOut': 200,
                            'overlayShow': false,
                            modal: false,
                            'type': 'iframe',
                            'scrolling': 'no',
                            'iframe': {
                                scrolling: 'no',
                                preload: true
                            }
                        });
                        $(this).bind("contextmenu", function (e) {
                            e.preventDefault();
                        });
            
                        //$(".fancybox").fancybox();
                        //setup for meta data
                        $("a.linkPoupUpCSS").fancybox({
                            'width': "95%",
                            'autoSize': false,
                            'height': 780,
                            'hideOnContentClick': false,
                            'type': 'iframe'
                        });
            
                        $(window).scroll(function (event) {
                            var scrol = $(this).scrollTop();
                            if (scrol > 50) {
                                $(".btn-top").show();
                            }
                            else {
                                $(".btn-top").hide();
                            }
                        }).trigger('scroll');
            
                        $(".btn-top").click(function () {
                            $("html, body").animate({ scrollTop: 0 });
                            return false;
                        });
            
                    });
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
        overflow-x: no-display;
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