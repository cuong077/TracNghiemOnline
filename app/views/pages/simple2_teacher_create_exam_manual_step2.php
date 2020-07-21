
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


                <input class="chapter_checkbox" style=""  max="100" type="checkbox" data-id="1" data-title="Mũ và Logarit" name="chapter_<?php echo $chapters_and_lesson->chapter_id; ?>" value="6">

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
                        <input class="" style=""  type="checkbox" data-id="6" data-title="Tính đơn điệu của hàm số khi biết công thức f(x), f'(x)" name="lesson[]" value="<?php echo $lesson->lesson_id; ?>" id="lesson_<?php echo $lesson->lesson_id; ?>">

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
        <button class="btn btn-primary cssPreview" type="button" id="loadQuestion">Tải câu hỏi</button>

        <button class="btn btn-primary cssPreview" type="button" id="createExam">Tạo đề thi</button>


    </div>
</div>



<table>
    <tbody>
        <tr>
            <td class="td-q-l col-lg-6">
                <h4 style="width:100%; min-width:520px; margin-bottom:0px;">
                                        Tổng số câu tìm được: <span id="totalSearch">0</span> câu
                                        <a id="aViewMoreTruoc" href="javascript:void(0)" onclick="getMore(1);" class="btn btn-primary" style="display: none;"> &lt;&lt; Xem trước </a>
                                        <a id="aViewMore" href="javascript:void(0)" onclick="getMore(2);" class="btn btn-primary" style="display: none;"> &gt;&gt; Xem sau </a>
                                        
                                    </h4>
                <span style="color:green; font-style:italic">(Nhấp chuột chọn câu hỏi, câu sẽ được chuyển qua mục <strong>được chọn bên phải</strong>)</span>
                <span onclick="addAllLeftToRight()" style="color:green; font-weight:bold; cursor:pointer; float:right;">
                                        <i class="glyphicon glyphicon-arrow-right"></i> Chọn nhanh
                                    </span>
            </td>
            <td class="td-q-r col-lg-6" style="vertical-align:top">
                <h4 style="margin-bottom:0px;">
                                        Tổng số câu đã chọn: <span id="totalSelected">0</span> câu
                                        <a id="aPreviewHidden" href="localhost/TracNghiemOnline/Home/PreviewQuestion?ids=" class="btn btn-primary linkPoupUpCSS" style="display:none">Xem trước đề thi &gt;&gt; </a>
                                        <a id="aPreview" href="javascript:void(0)" onclick="preview();" class="btn btn-primary" style="display: none;">Xem trước đề thi &gt;&gt; </a>
                                    </h4>
                <span style="color:red; font-style:italic">(Nhấp chuột vào câu hỏi để loại bỏ câu đã chọn)</span>
                <span onclick="removeAllRight()" style="color:green; font-weight:bold; cursor:pointer;float:right;">
                                        <i class="glyphicon glyphicon-remove"></i> Xóa nhanh
                                    </span>
            </td>
        </tr>
        <tr>
            <td class="td-q-l col-lg-6">
                <ul id="questionRegion">
                </ul>
            </td>
            <td class="td-q-r col-lg-6" style="vertical-align:top">
                <ul id="questionRegionSelected">
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

            $("#questionRegion").empty();
            removeAllRight();

            var searchLessonIDs = $("input[name = 'lesson[]']:checked").map(function(){
                return $(this).val();
            }).toArray();

            var data = {
                user_id : <?php echo $this->getUserId(); ?>,
                list_lesson : searchLessonIDs
            };

            $.ajax({
                url: "<?php echo Config::$base_url; ?>Teacher/getListQuestion",
                type: 'post',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (data) {
                    //console.log(data);

                    $("#totalSearch").text(data.length);

                    for (var i = 0; i < data.length; i++) {
                        createQuestionTemplate(data[i].question_id, data[i].content, data[i].breadcrum, data[i].list_answer[0].content, data[i].list_answer[1].content, data[i].list_answer[2].content, data[i].list_answer[3].content);
                    }

                    $("#overlay").fadeOut(300);　
                }
                
            });
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

                <li onclick="addQuestion(`+ question_id +`)" class="li-question" id="li_`+ question_id +`" data-id="`+ question_id +`">
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


        String.prototype.trimEnd = function(c) {
            if (this.length == 0) return this;
    
            c = c ? c : ' ';
            var i = this.length - 1;
            for (; i >= 0 && this.charAt(i) == c; i--);
            return this.substring(0, i + 1);
        }
        function empty(input) {
            return input == '' || input == undefined || input == null;
        }
        function preview()
        {
            var url = 'localhost/TracNghiemOnline/Home/PreviewQuestion?ids=';
            var ids = '';
            $('.SelectedQuestionCSS').each(function(){
                ids += $(this).val() + ',';
            });
            ids.trimEnd(',');
            url += ids;
            $('#aPreviewHidden').attr('href',url);
            $('#aPreviewHidden').click();
        }
        var currentPage = 1;
        var numOfPage = 0;
        var totalRecords = 0;
        var pageSize = 50;
    
        function getMore(idx)
        {
            if (idx == 1) {
                currentPage = currentPage - 1;
            } else {
                currentPage = currentPage + 1;
            }
    
            if (currentPage > 1) {
                $('#aViewMoreTruoc').show();
            } else {
                $('#aViewMoreTruoc').hide();
            }
            generateQuestion('localhost/TracNghiemOnline/Api/GenerateQuestionV2', '#classId', '#subjectId', '#chapterId', '#lessionId', '#questionRegion', '#ofme');
    
            if (currentPage >= numOfPage) {
                $('#aViewMore').hide();
                return;
            }
        }
    
        function generateQuestion(url, jClassId, jSubjectId, jChapterId, jLessionId, jId, jOfmeId) {
            var classId = $(jClassId).val();
            var subjectId = $(jSubjectId).val();
            var chapterId = $(jChapterId).val();
            var lessionId = $(jLessionId).val();
            var ofme = $(jOfmeId).val();
    
            var classTitle = $(jClassId + ' option:selected').text();
            var subjectTitle = $(jSubjectId + ' option:selected').text();
            var chapterTitle = $(jChapterId + ' option:selected').text();
            var lessionTitle = $(jLessionId + ' option:selected').text();
            var title = `${classTitle} > ${subjectTitle} > ${chapterTitle} > ${lessionTitle}`;
            if (empty(classId)) {
                showAlert({ 'content': 'Chức năng đang phát triển', callBack: function () { $(jClassId).focus(); } });
                $(jClassId).focus();
                return;
            }
            if (empty(subjectId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng chọn môn học', callBack: function () { $(jSubjectId).focus(); } });
                $(jSubjectId).focus();
                return;
            }
            if (empty(chapterId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng chương', callBack: function () { $(jChapterId).focus(); } });
                $(jChapterId).focus();
                return;
            }
            if (empty(lessionId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng bài', callBack: function () { $(jLessionId).focus(); } });
                $(jLessionId).focus();
                return;
            }
            var params = {
                classId: classId,
                subjectId: subjectId,
                chapterId: chapterId,
                lessionId: lessionId,
                ofme: ofme,
                pageIndex:currentPage
            };
    
            $.post(url, params, function (datas) {
    
                var jItems = datas.data;
                var html = '';
                if (datas.RC == 1) {
    
                    currentPage = parseInt(datas.currentPage);
                    numOfPage = parseInt(datas.numOfPage);
                    totalRecords = parseInt(datas.totalRecords);
                    pageSize = parseInt(datas.pageSize);
    
                    if (totalRecords >= pageSize) {
                        $('#aViewMore').show();
                    } else {
                        $('#aViewMore').hide();
                    }
                    if (currentPage >= numOfPage) {
                        $('#aViewMore').hide();
                    }
    
                    $('#totalSearch').html(totalRecords);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        var tbl = '<table class="table table-bordered table-responsive">';
                        tbl += '<tr>';
                        tbl += '<td class="td-a">' + jItem.A1.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A2.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A3.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A4.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '</tr>';
                        tbl += '</table>';
    
                        html += '<li onclick="addQuestion(' + jItem.Id + ')" class="li-question" id="li_' + jItem.Id + '" data-id="' + jItem.Id + '"><h4>' + title + ' </h4>' + jItem.Content.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '<br>' + tbl + '</li>';
                        html += '<li style="text-align: right;"><a href="localhost/TracNghiemOnline/tao-de-thi.html?id=' + jItem.Id + '" target="_blank"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a></li>';
    
                    }
    
                    $(jId).html(html);
    
                    refreshMathType();
    
                } else {
                    showAlert({ 'content': datas.RD });
                }
    
                //showAlert({ 'content': html });
            });
    
        }
        function generateQuestionForEdit(url, id, jId) {
    
            if (empty(id)) {
                showAlert({ 'content': 'Dữ liệu không hợp lệ', callBack: function () { $(jClassId).focus(); } });
                $(jClassId).focus();
                return;
            }
    
            var classTitle = $('#classId option:selected').text();
            var subjectTitle = $('#subjectId option:selected').text();
            var title = `${classTitle} > ${subjectTitle}`;
    
            var params = {
                id: id
            };
    
            $.post(url, params, function (datas) {
    
                var jItems = datas.data;
                var html = '';
                if (datas.RC == 1) {
                    $('#totalSearch').html(jItems.length);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        var tbl = '<table class="table table-bordered table-responsive">';
                        tbl += '<tr>';
                        tbl += '<td class="td-a">' + jItem.A1.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A2.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A3.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A4.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '</tr>';
                        
                        tbl += '</table>';
    
                        html += '<li onclick="addQuestion(' + jItem.Id + ')" class="li-question" id="li_' + jItem.Id + '" data-id="' + jItem.Id + '"><h4>' + title + ' </h4>' + jItem.Content.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '<br>' + tbl + '</li>';
                        html += '<li style="text-align: right;"><a href="localhost/TracNghiemOnline/tao-de-thi.html?id=' + jItem.Id + '" target="_blank"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a></li>';
                    }
    
                    $(jId).html(html);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        addQuestion(jItem.Id);
                    }
    
                    refreshMathType();
    
                } else {
                    showAlert({ 'content': datas.RD });
                }
    
                //showAlert({ 'content': html });
            });
        }
        function refreshMathType() {
            var scriptMathJax = document.createElement('script');
            scriptMathJax.src = 'https://cdn.789.vn/Content/MathJax/MathJax.js?config=TeX-MML-AM_CHTML-full';
            //scriptMathJax.src = 'localhost/TracNghiemOnline/Content/MathJax/MathJax.js?config=TeX-MML-AM_CHTML-full';
            document.body.appendChild(scriptMathJax);
    
            var mathRefresh = document.getElementById("questionRegion");
            MathJax.Hub.Queue(["Typeset", MathJax.Hub, mathRefresh]);
        }
        var totalQuestion = 0;
        function addQuestion(id) {
            var item = $('#q_' + id).val();
            if (!empty(item)) {
                showAlert({ 'content': 'Câu này đã được chọn, Thầy cô vui lòng chọn câu khác!' });
                return;
            }
            var examNumOfQuestion = $('#examNumOfQuestion').val();
            if (totalQuestion >= examNumOfQuestion) {
                showAlert({ 'content': `Tổng số câu đã chọn ${totalQuestion} = tổng số câu của bài thi ${examNumOfQuestion}<br>Để chọn câu này, Thầy cô vui lòng bỏ chọn các câu đã chọn, hoặc thêm tổng câu hỏi cho đề thi`, callBack: function () { $('#examNumOfQuestion').focus(); } });
                $('#examNumOfQuestion').focus();
                return;
            }
            var html = $('#li_' + id).html();
            var hidden = `<input type="hidden" id="q_${id}" name="questions[]" value="${id}" class="SelectedQuestionCSS">`;
            var li = `<li onclick="removeQuestion(${id})" class="li-question" id="li_selected_${id}">${hidden}${html}</li>`;
            $('#questionRegionSelected').append(li);
            totalQuestion++;
            $('#totalSelected').html(totalQuestion);
            $('#li_' + id).addClass('q-selected');
    
            //$('#classId').prop("disabled", true);
            //$('#subjectId').prop("disabled", true);
            //$('#ofme').prop("ofme", true);
            //ennableSave();
        }
        function removeQuestion(id) {
            $('#li_' + id).removeClass('q-selected');
            $('#li_selected_' + id).remove();
            totalQuestion--;
            $('#totalSelected').html(totalQuestion);
            //ennableSave();
        }
        function getChapter(url, class_id, subject_id, jId) {
            if (empty(subject_id) || subject_id <= 0 || empty(class_id) || class_id <= 0) {
                //alert('Dữ liệu không hợp lệ: ' + subject_id + '-' + class_id);
                return;
            }
            var uid = 0;
            var ofme = $('#ofme').val();
            if(ofme == 1)
            {
                uid = 220762;
            }
            var params = {
                action: 'chapter',
                class_id: class_id,
                subject_id: subject_id,
                uid:uid
            };
            $.post(url, params, function (datas) {
                $(jId).html(datas.HTML);
                currentPage = 1;
                numOfPage = 0;
                totalRecords = 0;
                pageSize = 50;
                if(220762 != 37153)
                {
                    $("#chapterId option[value='167']").remove();
                }
            });
        }
        function getLesson(url, chapter_id, jId) {
            if (empty(chapter_id) || chapter_id <= 0) {
                //showAlert({ content: 'Dữ liệu không hợp lệ' });
                return;
            }
            var uid = 0;
            var ofme = $('#ofme').val();
            if(ofme == 1)
            {
                uid = 220762;
            }
            var params = {
                action: 'lesson',
                chapter_id: chapter_id,
                uid:uid
            };
            $.post(url, params, function (datas) {
                $(jId).html(datas.HTML);
                currentPage = 1;
                numOfPage = 0;
                totalRecords = 0;
                pageSize = 50;
            });
        }
        function reset1()
        {
            $('#classId').val('');
            $('#subjectId').val('');
        }
        function addAllLeftToRight()
        {
            totalQuestion = 0;
            removeAllRight();
            var examNumOfQuestion = $('#examNumOfQuestion').val();
            var index = 1;
            $('#questionRegion li').each(function () {
                var id = $(this).attr('data-id');
                if (id != undefined)
                {
                    var item = $('#q_' + id).val();
                    if (empty(item)) {
                        if (index > examNumOfQuestion) {
                            return;
                        } else {
                            totalQuestion = index;
                            var html = $('#li_' + id).html();
                            var hidden = `<input type="hidden" id="q_${id}" name="questions[]" value="${id}" class="SelectedQuestionCSS">`;
                            var li = `<li onclick="removeQuestion(${id})" class="li-question" id="li_selected_${id}">${hidden}${html}</li>`;
                            $('#questionRegionSelected').append(li);
                            $('#totalSelected').html(totalQuestion);
                            $('#li_' + id).addClass('q-selected');
                            //ennableSave();
                            index++;
                        }
                    }
                }
            });
        }
        function removeAllRight()
        {
            totalQuestion = 0;
            $('#totalSelected').html(totalQuestion);
            $('#questionRegionSelected').html('');
            $('#questionRegion li').removeClass('q-selected');
            //ennableSave();
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