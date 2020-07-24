<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">Xem đáp án</h2>
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

                                                    <?php 

                                                        $color_answer = "";

                                                        if($answer->is_Correct == false && $answer->is_UserChoose == true){
                                                            $color_answer = "background:#FF0000;";
                                                        }else if($answer->is_Correct == true){
                                                            $color_answer = "background:#14A085;";
                                                        }


                                                    ?>

                                                    <li onclick="checkItem('<?php echo $question->id; ?>','q_<?php echo $question->id; ?><?php echo $label_answers[$ans_key]; ?>')" style="display: flex;white-space: nowrap; <?php echo $color_answer; ?> ">
                                                        <div class="checkbox-inline" style="float: left;width: 42px !important;"><label><?php echo $label_answers[$ans_key]; ?>.</label></div>
                                                        <div class="checkbox checkbox-success checkbox-inline" style="vertical-align: inherit !important;">
                                                            <input type="checkbox" class="chk_q chk_q_<?php echo $question->id; ?>" value="<?php echo $answer->id; ?>" id="q_<?php echo $question->id; ?><?php echo $label_answers[$ans_key]; ?>" <?php echo (($answer->is_UserChoose)?"checked":""); ?> disabled/>
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

                                                $color_li = "";

                                                $answer = false;

                                                foreach ($question->listAnswerOfQuestion as $_answer) {
                                                    if($_answer->is_UserChoose == true && $_answer->is_Correct == true){
                                                        $answer = true;
                                                        break;
                                                    }
                                                }

                                                if($question->Is_have_answer_choosed == true){
                                                    if($answer == true){
                                                        $color_li = "background:#14A085;";
                                                    }else{
                                                        $color_li = "background:#FF0000;";
                                                    }
                                                }

                                            ?>
                                                <li>
                                                    <input style="border-radius: 5px !important; <?php echo $color_li; ?>" type="button" id="q_btn_<?php echo $question->id; ?>" onclick="activeQuestion(<?php echo $question->id; ?>)" qid="<?php echo $question->id; ?>" attrindex="1" class="btn btnq border6<?php echo ($question->Is_have_answer_choosed == true)?" btnq-answered":""; ?>" value="Câu <?php echo $key+1; ?>">
                                                </li>

                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </center>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pricing-box-item left-center-box text-center" style="background: darkslategrey;">
                                <div class="pricing-terms">
                                        <h6>Tên :  <span id=""><?php echo $data["exam_name"]; ?></span></h6>
                                        <h6>Mô tả :  <span id=""><?php echo $data["exam_description"]; ?></span></h6>
                                    <h6>Thời gian làm bài: <span id=""><?php echo $data["exam_time"]; ?></span></h6>
                                    <h6>Tổng số câu hỏi: <span id=""><?php echo $data["total_question"]; ?> câu</span></h6>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script>

            var qArr = Array();

            <?php
                for($i = 0; $i < count($data["all_question"]); $i++){
            ?>

            qArr[<?php echo $i; ?>] = <?php echo $data["all_question"][$i]->id; ?>;

            <?php } ?>

        
            $(function () {
                activeQuestion(qArr[0]);
            });

            function next(nextOrPre) {
                var cIndex = qArr.indexOf(currentQuestionId);
                if ((nextOrPre == -1 && cIndex == 0) || (nextOrPre == 1 && cIndex == qArr.length - 1)) {
                    return;
                }
                //alert(qArr[cIndex + nextOrPre]);
                activeQuestion(qArr[cIndex + nextOrPre]);
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