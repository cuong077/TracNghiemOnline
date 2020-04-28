

<!-- Begin Login Content Area -->
            <form method="post" action="<?php echo Config::$base_url; ?>Login/process" id="formLogin">
                <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                            <!-- Login Form s-->
                            <form action="#" >
                                <div class="login-form">
                                    <h4 class="login-title">Đăng nhập</h4>
                                    <?php if(isset($data['error'])){ ?>

                                    <p style="color:red;text-align: center;"><?php echo $data['error']; ?></p>

                                    <?php } ?>
                                    <div class="row">

                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Tài khoản</label>
                                            <input name="username" class="mb-0" placeholder="Nhập tài khoản...">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Mật khẩu</label>
                                            <input name="password" class="mb-0" type="password" placeholder="Nhập mật khẩu...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Ghi nhớ tài khoản</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Quên mật khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="login" value="login">
                                            <button class="register-button mt-0" onclick="$('#formLogin').submit();">Đăng nhập</button>
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