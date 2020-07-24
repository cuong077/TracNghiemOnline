<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Kết quả kiểm tra</h2>
                <input type="hidden" value="2_Mũ và Logarit,">
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <!-- end divider -->
        <div class="row">
            <div class="col-lg-12">
                <h6 class="h6-title">Kết quả kiểm tra môn <?php echo $data["exam_description"]; ?></h6>
            </div>
            <div class="col-lg-8">
                <br>
                <div class="pricing-box-item row" style="background-color: #fff; padding: 10px;">
                    <div class="col-lg-4">
                        <div class="row text-center">
                            <div class="pricing-heading class-image">
                                <h3 class="class-text" style="margin-top:-1px;">
                                    <strong style="font-size:16px">
                                        ĐIỂM THI
                                    </strong><br>
                                    <strong style="font-size:40px">
                                        <?php echo round($data["total_answer_right"] * (10 / $data["total_question"]), 2); ?>
                                    </strong>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <p style="padding-top:50px;">
                            Đúng <?php echo $data["total_answer_right"]; ?> câu trên tổng số <?php echo $data["total_question"]; ?> câu hỏi
                        </p>
                        
                        <h3 style="color:red">Chúc mừng bạn đã hoàn thành xong bài kiểm tra!!!</h3>
                    </div>
                </div>
                <br>
                <div style="clear:both"></div>
                <div class="pricing-box-item">
                    <table class="table table-bordered table-inverse table-responsive">
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>Trả lời đúng</th>
                                <th>Trả lời sai</th>
                                <th>Không trả lời</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td>Kết quả thi</td>
                                    <td align="center"><?php echo $data["total_answer_right"]; ?></td>
                                    <td align="center"><?php echo $data["total_answer_wrong"]; ?></td>
                                    <td align="center"><?php echo $data["total_question_not_answer"]; ?></td>
                                </tr>
                                <!--
                            <tr>
                                <td style="text-align:right;"><strong>Tổng cộng</strong></td>
                                <td><strong> 3</strong></td>
                                <td><strong>7</strong></td>
                                <td><strong>0</strong></td>
                            </tr>
                        -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing-box-item">
                    <div class="pricing-terms">
                        <h6>Kiểm tra:  <span id=""><?php echo $data["exam_name"]; ?></span></h6>
                        <h6>Thời gian làm bài: <span id=""><?php echo $data["exam_time"]; ?></span></h6>
                        <h6>Tổng số câu hỏi: <span id=""><?php echo $data["total_question"]; ?> câu</span></h6>
                        <!-- <h6>Đã thi hết: <span id="">0,95 phút</span></h6> -->
                    </div>
                    <div class="pricing-action">
                        <a href="<?php echo Config::$base_url; ?>Student/viewExamResultAnswer/<?php echo $data["result_id"]; ?>" class="btn btn-medium btn-theme" style="color: white;">Xem đáp án</a>
                        <!--<a href="https://www.789.vn/xem-dap-an.html" class="btn btn-medium btn-theme">Xem gợi ý bài giải</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>