


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
                    <div class="col-lg-12" style="float:left">
                                <div class="section-title">
                                    <h2>Danh sách câu hỏi :</h2>
                                    <div class="panel-body">
                                         <div>
                                            <table width="100%" cellspacing="1" cellpadding="3" bgcolor="" class="table table-bordered">
                                                <tbody>
                                                    <?php
                                                        foreach ($data["all_question"] as $key => $question){

                                                        $right = null;

                                                        foreach ($question->listAnswerOfQuestion as $value) {
                                                            if($value->is_UserChoose && (int)$value->is_Correct == 1){
                                                               $right = true;
                                                               break; 
                                                            }

                                                            if($value->is_UserChoose && (int)$value->is_Correct == 2){
                                                                $right = false;
                                                            }

                                                        }

                                                    ?>
                                                    <tr>
                                                        <th bgcolor="#5EBAF2">Câu <?php echo $key + 1; ?> 
                                                        : 
                                                        <?php if($right){ ?>
                                                            <span style="color:green;">(Đúng)</span>
                                                        <?php }else if($right == false){ ?>
                                                            <span style="color:red;">(Sai)</span>
                                                        <?php }else{ ?>
                                                            <span style="color:white;">(Không chọn)</span>
                                                        <?php } ?>
                                                        </th>
                                                        <th colspan="3" bgcolor="#FFFFFF"><?php echo $question->Content; ?></th>
                                                    </tr>
                                                    <tr>

                                                        <form>
                                                            
                                                            <?php 

                                                            foreach ($question->listAnswerOfQuestion as $key => $answer) {
                                                                
                                                            ?>
                                                            
                                                            <td colspan="0" bgcolor="#E9FBF8">
                                                                
                                                                <input type="radio" id="answer" value="" name="answer" <?php if($answer->is_UserChoose){ echo "checked"; } ?> disabled>
                                                                
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
                </div>
            </div>
        </div>
    </section>