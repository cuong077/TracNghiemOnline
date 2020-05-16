    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                  <p style="font-size: 20px;" class="mb-4"  data-aos="fade-up" data-aos-delay="200">Nếu bạn chưa có tài khoản hãy chọn đăng ký ngay.</p>
                                  <p data-aos="fade-up" data-aos-delay="300"><a href="Register" class="btn btn-primary py-3 px-5 btn-pill">Đăng ký ngay</a></p>
                
                                </div>
                
                                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                  <form action="Login/process" method="post" class="form-box">
                                    <?php if(isset($data['error'])){ ?>

                                        <p style="color:red;text-align: center;"><?php echo $data['error']; ?></p>

                                    <?php } ?>
                                    <h3 class="h4 text-black mb-4">Đăng Nhập</h3>
                                    <div class="form-group">
                                      <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" name="login" class="btn btn-primary btn-pill" value="Đăng nhập">
                                    </div>
                                  </form>
                
                                </div>
                              </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->