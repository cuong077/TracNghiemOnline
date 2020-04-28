<!-- Begin Login Content Area -->
            <form method="post" action="<?php echo Config::$base_url; ?>Register/process">
                <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <form action="#">
                                <div class="login-form">
                                    <h4 class="login-title">Đăng kí</h4>
                                    <?php if(isset($data['success']) && $data['success'] != ""){ ?>
                                        <h3 style="color: green;text-align: center;">Đăng kí thành công</h3>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>
                                                Họ(*) 
                                                <?php if(isset($data['error']['firstname'])){ ?>

                                                <small style="color: red;"><?php echo $data['error']['firstname']; ?></small>
                                                
                                                <?php } ?>
                                            </label>

                                            <input class="mb-0" name="firstname" type="text" placeholder="Nhập họ..." value="<?php echo (isset($data['back_firstname'])?$data['back_firstname']:''); ?>">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tên(*)
                                                <?php if(isset($data['error']['lastname'])){ ?>
                                                    
                                                <small style="color: red;"><?php echo $data['error']['lastname']; ?></small>
                                                
                                                <?php } ?>
                                            </label>
                                            <input class="mb-0" name="lastname" type="text" placeholder="Nhập tên..." value="<?php echo (isset($data['back_lastname'])?$data['back_lastname']:''); ?>">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Tài khoản(*)
                                                <?php if(isset($data['error']['username'])){ ?>
                                                    
                                                <small style="color: red;"><?php echo $data['error']['username']; ?></small>
                                                
                                                <?php } ?>
                                            </label>
                                            <input class="mb-0" name="username" placeholder="Nhập tên tài khoản..." value="<?php echo (isset($data['back_username'])?$data['back_username']:''); ?>">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật khẩu(*)
                                                <?php if(isset($data['error']['password'])){ ?>
                                                    
                                                <small style="color: red;"><?php echo $data['error']['password']; ?></small>
                                                
                                                <?php } ?>
                                            </label>
                                            <input class="mb-0" name="password" type="password" placeholder="Nhập mật khẩu...">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Nhập lại mật khẩu(*)
                                                <?php if(isset($data['error']['repassword'])){ ?>
                                                    
                                                <small style="color: red;"><?php echo $data['error']['repassword']; ?></small>
                                                
                                                <?php } ?>
                                            </label>
                                            <input class="mb-0" name="repassword" type="password" placeholder="Nhập thêm lần nữa...">
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0">Đăng kí</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            </form>
            <!-- Login Content Area End Here -->