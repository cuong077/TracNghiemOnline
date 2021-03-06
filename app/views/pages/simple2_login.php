<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="pageTitle">Đăng nhập</h2>
            </div>
        </div>
    </div>
</section>


<div class="row">

</div>


<div class="row">
    <div class="col-lg-4 col-lg-offset-4" style="border: 1px solid black;border-radius: 5px;">
        <div class="login-box-info" style="margin: 15px;">
            <form action="Login/process" class="form-horizontal" method="post" role="form">
                <div class="form-group">
                    <?php if(isset($data['error'])){ ?>
                    <div class="text-center">
                        <span class="error" style="color: red;">
                            &nbsp; <?php echo $data['error']; ?>
                        </span>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group" style="margin-right: 0px !important;margin-left: 0px !important;"> <i
                        class="glyphicon glyphicon-envelope"></i>
                    <label for="UserName">Email</label>
                    <input autofocus="autofocus" class="form-control" data-val="true"
                        data-val-email="Địa chỉ email không hợp lệ" data-val-required="Bạn chưa nhập Email"
                        id="UserName" name="email" type="text" value=""> <span class="field-validation-valid"
                        data-valmsg-for="UserName" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group" style="margin-right: 0px !important;margin-left: 0px !important;"> <i
                        class="glyphicon glyphicon-lock"></i>
                    <label for="Password">Mật khẩu</label>
                    <input class="form-control" data-val="true" data-val-length="Mật khẩu sử dụng ít nhất 6 ký tự"
                        data-val-length-max="100" data-val-length-min="6" data-val-required="Bạn chưa nhập mật khẩu"
                        id="Password" name="password" type="password"> <span class="field-validation-valid"
                        data-valmsg-for="Password" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group mb0 text-center"
                    style="margin-right: 0px !important;margin-left: 0px !important;">
                    <button id="btnLogin" class="btn btn-primary" type="submit" name="login">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>