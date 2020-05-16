
    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                  <p style="font-size: 20px;" class="mb-4"  data-aos="fade-up" data-aos-delay="200">Nếu bạn đã có tài khoản hãy chọn nút đăng nhập dưới đây.</p>
                                  <p data-aos="fade-up" data-aos-delay="300"><a href="Login" class="btn btn-primary py-3 px-5 btn-pill">Đăng nhập</a></p>
                
                                </div>
                
                                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                  <form action="Register/process" method="post" class="form-box">
                                    <h3 class="h4 text-black mb-4">Đăng Ký</h3>
                                    <?php if(isset($data['success']) && $data['success'] != ""){ ?>
                                        <h3 style="color: green;text-align: center;">Đăng kí thành công</h3>
                                    <?php } ?>
                                    
                                    <div class="form-group">
                                        
                                                <?php if(isset($data['error']['fullname'])){ ?>
                                                    
                                                <label><small style="color: red;"><?php echo $data['error']['fullname']; ?></small></label>
                                                
                                                <?php } ?>
                                            <input type="text" name="fullname" class="form-control" placeholder="Tên đầy đủ" value="<?php echo (isset($data['back_fullname'])?$data['back_fullname']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        
                                                <?php if(isset($data['error']['email'])){ ?>
                                                    
                                                <label><small style="color: red;"><?php echo $data['error']['email']; ?></small></label>
                                                
                                                <?php } ?>
                                        
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($data['back_email'])?$data['back_email']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        
                                                <?php if(isset($data['error']['username'])){ ?>
                                                    
                                                <label><small style="color: red;"><?php echo $data['error']['username']; ?></small></label>
                                                
                                                <?php } ?>
                                        
                                      <input type="text" name="username" class="form-control" placeholder="Tên tài khoản" value="<?php echo (isset($data['back_username'])?$data['back_username']:''); ?>">
                                    </div>
                                    <div class="form-group">
                                        
                                                <?php if(isset($data['error']['password'])){ ?>
                                                    
                                                <label><small style="color: red;"><?php echo $data['error']['password']; ?></small></label>
                                                
                                                <?php } ?>
                                      <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        
                                                <?php if(isset($data['error']['repassword'])){ ?>
                                                    
                                                <label><small style="color: red;"><?php echo $data['error']['repassword']; ?></small></label>
                                                
                                                <?php } ?>
                                        
                                        <input type="password" name="repassword" class="form-control" placeholder="Nhập Lại Mật khẩu">
                                      </div>
                                    <div class="form-group">
                                      <input type="submit" name="register" class="btn btn-primary btn-pill" value="Đăng ký">
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
