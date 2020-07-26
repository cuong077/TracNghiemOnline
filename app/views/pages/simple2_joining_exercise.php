<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">Đang làm bài tập về nhà.....</h2>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <!-- end divider -->
                <div class="row">
                    <form method="post" action="https://student.789.vn/ket-qua-thi.html" id="frmMain" name="frmMain">
                        <div class="col-lg-8">
                            <div class="pricing-box-item shadowexam">
                                <div id="questionRegion">
                                    <?php
                                        foreach ($data["all_question"] as $key => $question){
                                    ?>
                                        <div class="qItem" id="questionRegionItem_<?php echo $question->id; ?>" style="display: none;">
                                            <h4 class="qItem-QTitle">
                                                <strong>Câu hỏi số <?php echo $key+1; ?></strong>
                                            </h4>
                                            <div class="qItem-Content">
                                                <?php echo $question->Content; ?>
                                            </div>
                                            <h4 class="qItem-QTitle">
                                                <strong>Trả lời</strong>
                                            </h4>

                                            <div class="qItem-Answer">
                                                <input type="hidden" id="hidden_<?php echo $question->id; ?>" name="hidden_<?php echo $question->id; ?>" class="hiddenQIDCSS" data-id="<?php echo $question->id; ?>" value="">
                                                <ul class="qItem-Answer-ul">

                                                    <?php

                                                        $label_answers = array('A', 'B', 'C', 'D');
                                                        foreach ($question->listAnswerOfQuestion as $ans_key => $answer) {
                                                           
                                                    ?>

                                                    <li onclick="checkItem('<?php echo $question->id; ?>','q_<?php echo $question->id; ?><?php echo $label_answers[$ans_key]; ?>')" style="display: flex;white-space: nowrap; ">
                                                        <div class="checkbox-inline" style="float: left;width: 42px !important;"><label><?php echo $label_answers[$ans_key]; ?>.</label></div>
                                                        <div class="checkbox checkbox-success checkbox-inline" style="vertical-align: inherit !important;">
                                                            <input type="checkbox" class="chk_q chk_q_<?php echo $question->id; ?>" value="<?php echo $answer->id; ?>" id="q_<?php echo $question->id; ?><?php echo $label_answers[$ans_key]; ?>" <?php echo (($answer->is_UserChoose)?"checked":""); ?> />
                                                            <label for="q_<?php echo $question->id; ?><?php echo $label_answers[$ans_key]; ?>"> <?php echo $answer->Content; ?> </label>
                                                        </div>
                                                    </li>

                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </div>
                                    <?php } ?>

                                       
                                        

                                </div>


                                <div class="col-lg-12" style="margin:0; padding:0;min-height:32px;">
                                    <input type="button" id="q_btn_pre" onclick="next(-1)" class="btn btnq" value="<<" style="float:left; background-color:#0F8EE2;border-radius: 5px !important;">
                                    <input type="button" id="q_btn_next" onclick="next(1)" class="btn btnq" value=">>" style="float:right; background-color:#0F8EE2;border-radius: 5px !important;">
                                </div>
                                <div style="display:inline-block; clear:both"></div>
        
                                <div class="exam-container">
                                    <center>
                                        <ul class="ul-exam-button">
                                            <?php
                                                foreach ($data["all_question"] as $key => $question){
                                            ?>
                                                <li>
                                                    <input style="border-radius: 5px !important;" type="button" id="q_btn_<?php echo $question->id; ?>" onclick="activeQuestion(<?php echo $question->id; ?>)" qid="<?php echo $question->id; ?>" attrindex="1" class="btn btnq border6<?php echo ($question->Is_have_answer_choosed == true)?" btnq-answered":""; ?>" value="Câu <?php echo $key+1; ?>">
                                                </li>

                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </center>
                                </div>
                                <div style="clear:both"></div>
                                <div class="pricing-action">
                                    <input type="button" id="btn3" onclick="finish()" class="btn btn-medium btn-lg btn-theme" value="Nộp bài">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pricing-box-item left-center-box text-center" style="background: darkslategrey;">
                                <div class="pricing-terms">
                                        <h6>Bài thi:  <span id=""><?php echo $data["exam_name"]; ?></span></h6>
                                    <h6>Thời gian làm bài: <span id="">50 phút</span></h6>
                                    <h6>Tổng số câu hỏi: <span id=""><?php echo count($data["all_question"]); ?> câu</span></h6>
                                </div>
                                <div class="pricing-heading class-image" class_id="2">
                                    <h3 class="class-text" style="padding-top:3px;">
                                        <strong>Thời gian</strong><br>
                                        <span id="countDownTimeMunute">00</span> : <span id="countDownTime">00</span>
                                    </h3>
                                </div>
                                <div class="pricing-action" style="background: darkslategrey;">
                                    <input type="button" id="btn2" onclick="finish()" class="btn btn-mediumlg btn-lg btn-theme" value="Nộp bài">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script>
            var totalQuestion = parseInt('<?php echo count($data["all_question"]); ?>');
            var totalDuration = parseInt('2');
            var qArr = Array();

            <?php
                for($i = 0; $i < count($data["all_question"]); $i++){
            ?>

            qArr[<?php echo $i; ?>] = <?php echo $data["all_question"][$i]->id; ?>;

            <?php } ?>

        
            $(function () {
                activeQuestion(qArr[0]);
                var showWarning = parseInt('');
                if (showWarning == 1) {
                    showAlert({ content: 'Bạn đang thực hiện bài thi !', color: 'red', close: 'Đồng ý' });
                }
            });

            function next(nextOrPre) {
                var cIndex = qArr.indexOf(currentQuestionId);
                if ((nextOrPre == -1 && cIndex == 0) || (nextOrPre == 1 && cIndex == qArr.length - 1)) {
                    return;
                }
                //alert(qArr[cIndex + nextOrPre]);
                activeQuestion(qArr[cIndex + nextOrPre]);
            }


            function finish(){

                var totalAnswer = $('.btnq-answered');
                if (totalAnswer.length < totalQuestion) {
                    //
                    var message = 'Bạn còn ' + (totalQuestion - totalAnswer.length) + ' câu chưa trả lời!<br>Thời gian còn (' + $("#countDownTimeMunute").text() + ' phút ' + $("#countDownTime").text() + ' giây) <br>Bạn đồng ý nộp bài?';
        
                    
                    showAlert({ ok: 'Nộp bài', close: 'Đóng', w: '300px', h: '100px', content: message, callBack: function () { window.location="<?php echo Config::$base_url . 'Student/submitExam/' . $data['result_id']; ?>"; } });
        
                    return;
                }else if(parseInt($("#countDownTimeMunute").text()) > 0 || parseInt($("#countDownTime").text()) > 0){

                    showAlert({ ok: 'Nộp bài', close: 'Đóng', w: '300px', h: '100px', content: "Bạn có chắc chắn nộp bài khi chưa hết thời gian làm bài?", callBack: function () { window.location="<?php echo Config::$base_url . 'Student/submitExam/' . $data['result_id']; ?>"; } });
                    
                }else{
                    window.location="<?php echo Config::$base_url . 'Student/submitExam/' . $data['result_id']; ?>";
                }

            }

            var distance = <?php echo $data["time_left"]; ?>;

            var x = setInterval(function() {

            // Find the distance between now and the count down date
            distance = distance - 1;

            //console.log(distance);

            // Time calculations for days, hours, minutes and seconds
            var minutes = Math.floor((distance % (1 * 60 * 60)) / (1 * 60));
            var seconds = Math.floor((distance % (1 * 60)) / 1);


            $("#countDownTimeMunute").text(minutes);
            $("#countDownTime").text(seconds);


            // If the count down is finished, write some text
            if (distance < 0) {

                clearInterval(x);
                
                alert("Hết giờ");

                window.location="<?php echo Config::$base_url . 'Student/submitExam/' . $data['result_id']; ?>";
            }
            }, 1000);



            var cTimeout;

            function checkItem(qId, chkId) {

                $('.chk_q_' + qId).prop('checked', false);
                $('#' + chkId).prop('checked', true);

                $.ajax({   
                    type: "POST",
                    data : {
                        answer_id : $('#' + chkId).val(),
                        result_id : <?php echo $data['result_id']; ?>,
                        question_id : qId
                    },
                    cache: false,  
                    url: "<?php echo Config::$base_url; ?>Student/userAnswerQuestion",   
                    success: function(data){

                    }   
                });  

                $('#hidden_' + qId).val($('#' + chkId).val());
                $('#q_btn_' + qId).addClass('btnq-answered');
                clearTimeout(cTimeout);
                cTimeout = setTimeout(function () { next(1); }, 1000);
        
        
            }


            var currentQuestionId;

            function activeQuestion(qId) {
        
                currentQuestionId = qId;
                $('.qItem').hide();
                $('#questionRegionItem_' + qId).show();
                $('.btnq').removeClass('btnq-active');
                $('#q_btn_' + qId).addClass('btnq-active');
        
            }

        </script>