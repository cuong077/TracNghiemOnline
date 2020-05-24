
    <!-- Hero Section Begin -->
    <section style="padding:50px 0;" class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
    </section>
    <!-- Hero Section End -->

 <!-- Xem noi dung bai thi begins -->
    <div class="body">
        <div style="margin-top:30px;" class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <form action="Examination/findExam" method="post">
                        <h4 style="color:black; background-color:#70BFFF; border-radius:5px; padding: 5px;margin-bottom: 20px;text-align: center;" class="noidung">THAM GIA BÀI THI THÔNG QUA ID DO GIÁO VIÊN CUNG CẤP</h4>

                        <?php if($data['error'] != null){ ?>
                        <p style="color: red;text-align: center;"><?php echo $data['error']; ?></p>
                        <?php } ?>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="Nhập ID...." aria-label="Nhập ID...." aria-describedby="basic-addon2" name="exam_id">
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="find">Tham gia</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
           
    </div>
    <!-- Xem noi dung bai thi end -->
  