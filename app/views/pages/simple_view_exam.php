
    <!-- Hero Section Begin -->
    <section style="padding:50px 0;" class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
    </section>
    <!-- Hero Section End -->

 <!-- Xem noi dung bai thi begins -->
    <div class="body">
        <div style="margin-top:30px;" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h4 style="color:black; background-color:#70BFFF; border-radius:5px; padding: 5px;" class="noidung">NỘI DUNG BÀI THI</h4>
                        <div class="row">
                        <div class="col-lg-9">
                            <div class="p-4 rounded bg-white why-choose-us-box">

                                <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                    <div class="mr-3"><h5 class="m-0"><b>Tên bài thi:</b></h5></div>

                                    
                                    <div><h5 class="m-0"><?php echo $data["description"]; ?></h5></div>
                                </div>
                  
                                <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                    <div class="mr-3"><h5 class="m-0"><b>Thời lượng:</b></h5></div>
                                    <div><h5 class="m-0"><?php echo $data["time"]; ?> phút</h5></div>
                                </div>
                
                  
                                <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                    <div class="mr-3"><h5 class="m-0"><b>Hình thức:</b></h5></div>
                                    <div><h5 class="m-0">Trắc nghiệm</h5></div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-3">
                            <a href='<?php echo Config::$base_url.'Examination/joinExam/'.$data["exam_id"]; ?>'><button style="margin:10px;"  type="button" class="btn btn-success">Bắt đầu thi</button></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
    </div>
    <!-- Xem noi dung bai thi end -->
  