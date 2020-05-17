
    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Hệ thống thi trắc nghiệm trực tuyến</h2>
                            <p>TracNgiemOnline</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
   
    <!-- Categories Section End -->

    <!-- Most Search Section Begin -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo $data["description_of_exam"]; ?></h2>  
                    </div>
                    <div class="col-lg-8" style="float:left">
                                <div class="section-title">
                                    <h2>Danh sách câu hỏi :</h2>
                                    <div class="panel-body">
                                         <div>
                                            <table width="100%" cellspacing="1" cellpadding="3" bgcolor="" class="table table-bordered">
                                                <tbody>
                                                    <?php
                                                        foreach ($data["all_question"] as $key => $question) {
                                                    ?>
                                                    <tr>
                                                        <th bgcolor="#5EBAF2">Câu <?php echo $key + 1; ?> : </th>
                                                        <th colspan="3" bgcolor="#FFFFFF"><?php echo $question->Content; ?></th>
                                                    </tr>
                                                    
                                                    <tr>

                                                        
                                                            <form method="post" action="Examination/answerQuestion">
                                                            <?php 

                                                            foreach ($question->listAnswerOfQuestion as $key => $answer) {
                                                                
                                                            ?>
                                                            
                                                            <td colspan="0" bgcolor="#E9FBF8">
                                                                
                                                                    <input type="radio" id="answer" value="<?php echo $answer->id; ?>" name="answer" <?php if($answer->is_UserChoose){ echo "checked"; } ?> />

                                                                    <input type="hidden" name="exam_result_id" value="<?php echo $data["exam_result_id"]; ?>" />

                                                                    <input type="hidden" name="question_id" value="<?php echo $question->id; ?>" />

                                                                    <label for="answer"><?php echo $answer->Content; ?></label><br>
                                                                
                                                            </td>


                                                            <?php 
                                                                }
                                                            ?>

                                                            </form>
                                                        
                                                    </tr>
                                                    

                                                    <?php } ?>

                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="col-lg-4" style="float:right;">
                        <div class="section-title">
                            <h2>Thời gian còn lại</h2>  
                        </div>
                          <p id="demo" style="text-align: center;font-size: 60px;margin-top: 0px;color:black;"></p>
                    </div>

                    <div class="col-lg-12" style="clear:both;">
                        <a href="Examination/submitExam/<?php echo $data["exam_result_id"]; ?>"><button style="margin:10px;"  type="button" class="btn btn-success">Nộp bài</button></a>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Most Search Section End -->
    <script>

        $( document ).ready(function() {
            $("input[name = 'answer']").click(function(){


                console.log($(this).siblings("input[name = 'answer']"));
                $.ajax({   
                    type: "POST",
                    data : {
                        answer : $(this).val(),
                        exam_result_id : $(this).siblings("input[name = 'exam_result_id']").val(),
                        question_id : $(this).siblings("input[name = 'question_id']").val()
                    },
                    cache: false,  
                    url: "Examination/answerQuestion",   
                    success: function(data){                      
                    }   
                });  

            });
        });

        // Update the count down every 1 second

        var distance = <?php echo $data["time_left"]; ?>;

        var x = setInterval(function() {

        // Find the distance between now and the count down date
        distance = distance - 1;

        console.log(distance);

        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance % (1 * 60 * 60)) / (1 * 60));
        var seconds = Math.floor((distance % (1 * 60)) / 1);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
        }, 1000);

    </script>
    