<?php 

$grades = $data["grades"];
// var_dump($data["error"]);
$error = $data["error"];

?>

<div class="container" style="margin-top:20px;">
</div>

<style>
.ban-tin-789 {
    background-color: #212121;
}
</style>


<script>
function examNow(subjectId) {
    $('#subjectId').val(subjectId);
    $('#frmExam').submit();
}
</script>

<div id="content">
    <div class="container">
        <!-- Start Register Box -->
        <div class="register-box">
            <form class="form-horizontal" method="post" role="form" novalidate="novalidate">
                <div class="validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div> <br>
                <?php $success = $data["success"];
                    $success = "test";
                    if(isset($success) && $success != ""){
                ?>
                <div class="inner text-center">
                    <div style="text-align">
                        <h1 class="text text-info">Đăng kí thành công</h1>
                    </div>

                    <div style="text-align; margin: 30px;">
                        <a href="Login" class=""><h1 class="pageTitle"  style="width: 30%;">Đăng nhập</h1></a>
                    </div>
                </div>
                <?php
                    }
                    else{
                ?>


                <div class="inner text-center">
                    <div style="text-align">
                        <h1 class="pageTitle">Đăng kí tài khoản</h1>
                    </div>

                    <div class="row">
                        <hr>
                        <div class="col-sm-6">
                            <div class="form-group" style="margin: 0px;">
                                <label class="col-sm-4 control-label text-center" for="">&nbsp;</label>

                                <div class="col-sm-8">
                                    <h4 class="sub-title">Thông tin tài khoản</h4>
                                </div>
                            </div>
                            <!-- <h4 class="sub-title" style="margin-left: -20px;">Thông tin tài khoản</h4> -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><i
                                        class="glyphicon glyphicon-envelope"></i> Địa chỉ
                                    Email<sub class="note">*</sub></label>
                                <div class="col-sm-8 <?php if($error["email"] != "") echo "has-error"; ?>">
                                    <input class="form-control" data-val="true"
                                        data-val-email="Địa chỉ email không hợp lệ"
                                        data-val-required="Bạn chưa nhập email" id="email" name="email" type="text"
                                        value="<?php if(isset($data["back_email"])) echo $data["back_email"]; ?>"
                                        placeholder="Vui lòng nhập Email." required>
                                    <span class="help-block"><?php echo @$error["email"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><span
                                        class="glyphicon glyphicon-user" aria-hidden="true"></span></i>Tên tài
                                    khoản<sub class="note"> *</sub></label>
                                <div class="col-sm-8 <?php if($error["username"] != "") echo "has-error"; ?>">
                                    <input class="form-control" data-val="true"
                                        data-val-required="Bạn chưa nhập tên tài khoản" id="username" name="username"
                                        type="text"
                                        value="<?php if(isset($data["back_username"])) echo $data["back_username"]; ?>"
                                        placeholder="Vui lòng nhập tên tài khoản" required>
                                    <span class="help-block"><?php echo @$error["username"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><i
                                        class="glyphicon glyphicon-lock"></i> Mật khẩu<sub class="note">
                                        *</sub></label>
                                <div class="col-sm-8  <?php if($error["password"] != "") echo "has-error"; ?>">
                                    <input class="form-control" data-val="true"
                                        data-val-length="Mật khẩu sử dụng ít nhất 6 ký tự." data-val-length-max="100"
                                        data-val-length-min="6" data-val-required="Bạn chưa nhập mật khẩu"
                                        placeholder="Vui lòng nhập mật khẩu" type="password" name="password" required>
                                    <span class="help-block"><?php echo @$error["password"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><i
                                        class="glyphicon glyphicon-copy"></i> Xác nhận mật
                                    khẩu<sub class="note"> *</sub></label>
                                <div class="col-sm-8  <?php if($error["repassword"] != "") echo "has-error"; ?>">
                                    <input class="form-control" data-val="true" type="password" name="repassword"
                                        required placeholder="Nhập lại mật khẩu">
                                    <span class="help-block"><?php echo @$error["repassword"]?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <span style="color:red">

                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 last">
                            <div class="form-group" style="margin: 0px;">
                                <label class="col-sm-4 control-label text-center" for="">&nbsp;</label>

                                <div class="col-sm-8">
                                    <h4 class="sub-title">Thông tin cá nhân</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><i
                                        class="glyphicon glyphicon-user"></i> Họ tên<sub class="note">
                                        *</sub></label>

                                <div class="col-sm-8 <?php if($error["fullname"] != "") echo "has-error"; ?>">
                                    <input class="form-control" data-val="true"
                                        data-val-length="Họ và tên sử dụng ít nhất 2 ký tự" data-val-length-max="256"
                                        data-val-length-min="2" data-val-required="Bạn chưa nhập họ tên" id="Fullname"
                                        name="fullname" type="text"
                                        value="<?php if(isset($data["back_fullname"])) echo $data["back_fullname"]; ?>"
                                        placeholder="Vui lòng nhập họ và tên" required>
                                    <span class="help-block"><?php echo @$error["fullname"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for="" id="lblBirthday"><i
                                        class="glyphicon glyphicon-calendar"></i> Ngày sinh <sub class="note">
                                        *</sub></label>
                                <div class="col-sm-8 <?php if($error["birthday"] != "") echo "has-error"; ?>">
                                    <input class="form-control hasDatepicker" type="text" name="birthday" id="birthday"
                                        placeholder="Chọn ngày sinh" required
                                        value="<?php if(isset($data["back_birthday"])) echo $data["back_birthday"]; ?>">
                                    <script>
                                    $(function() {

                                        $("#birthday").datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            yearRange: "-30:-14",
                                            dateFormat: "dd/mm/yy"
                                        });
                                        $("#lblBirthday").click(function() {
                                            $("#Birthday").val("");
                                        });
                                    });
                                    </script>
                                    <span class="help-block"><?php echo @$error["birthday"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><span
                                        class="glyphicon glyphicon-earphone"></span> SDT<sub class="note">
                                        *</sub></label>
                                <div class="col-sm-8 <?php if($error["phoneNumber"] != "") echo "has-error"; ?>">
                                    <input class="form-control" id="PhoneNumber" name="phoneNumber" type="text"
                                        value="<?php if(isset($data["back_phoneNumber"])) echo $data["back_phoneNumber"]; ?>"
                                        placeholder="Vui lòng nhập số điện thoại." required>
                                    <span class="help-block"><?php echo @$error["phoneNumber"]?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-center" for=""><span
                                        class="glyphicon glyphicon-flag"></span> Khối <sub class="note">
                                        *</sub>
                                </label>
                                <div class="col-sm-8">
                                    <select class="col-sm-10 browser-default custom-select form-control"
                                        name="gradeSelect">
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php 
                                            foreach ($grades as $grade) {
                                                # code...
                                        ?>

                                        <option value="<?php echo $grade[0];?>">
                                            <?php echo $grade[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">

                            <div class="center-block" style="display: inline-block; margin-top: 10px;">
                                <div class="form-group">
                                    <button class="btn btn-reset" type="reset" style="color: white;">Điền lại
                                        thông tin</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" type="submit" name="register">Đăng ký tài
                                        khoản</button>
                                </div>
                            </div>
                            <p class="note">(<span style="color:red">*</span>) Thông tin bắt buộc</p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

            </form>
        </div>
        <!-- End Register Box -->
    </div>
</div>

</div> <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<script language="javascript">
$(document).ready(function() {
    $("#btnLoginQuickLogin").fancybox({
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        width: '300px',
        height: '450px',
        autoSize: true,
        //closeClick: false,
        openEffect: 'none',
        //closeEffect: 'none',
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false,
        modal: false,
        'type': 'iframe',
        'scrolling': 'no',
        'iframe': {
            scrolling: 'no',
            preload: true
        }
    });
    $(this).bind("contextmenu", function(e) {
        e.preventDefault();
    });

    //setup for meta data
    $("a.linkPoupUpCSS").fancybox({
        'width': "95%",
        'autoSize': false,
        'height': 780,
        'hideOnContentClick': false,
        'type': 'iframe'
    });

    $(window).scroll(function(event) {
        var scrol = $(this).scrollTop();
        if (scrol > 50) {
            $(".btn-top").show();
        } else {
            $(".btn-top").hide();
        }
    }).trigger('scroll');

    $(".btn-top").click(function() {
        $("html, body").animate({
            scrollTop: 0
        });
        return false;
    });

});
</script>
<style>
iframe.fancybox-iframe {
    overflow: hidden !important;
}

.fancybox-inner {
    overflow: hidden !important;
}

.end-footer {
    padding: 10px 0px;
    text-align: center;
    background-color: #0D47A1;
}
</style>
<script>
function showAlert(options) {
    var close = 'Đóng';
    var ok = 'Tiếp tục';
    if (options.close != null) close = options.close;
    if (options.ok != null) ok = options.ok;
    var okButton = '';
    var color = '';
    if (options.color != null && options.color != '' && options.color != undefined) {
        color = 'color:' + options.color + ';'
    }
    if (typeof options.callBack === 'function' && options.ok != null) {
        okButton = '<input type="button" id="alertBoxBTNYes" class="btn btnq" value="' + ok + '">&nbsp&nbsp';
    }
    var boxHtml = '<div id="alertRegion">' +
        '<div id="alert">' +
        '<div style="text-align:center; vertical-align:middle;width:101%;' + color + '">' +
        options.content +
        '<br><br>' +
        okButton +
        '<input id="alertBoxBTNClose" type="button" class="btn btnq" value="' + close + '">' +
        '</div>' +
        '</div>' +
        '</div>';
    $.fancybox({
        //title: "Thông báo!",
        autoCenter: true,
        closeClick: false,
        closeEffect: 'none',
        width: options.w > 0 ? options.w + 20 : 200,
        height: options.h > 0 ? options.h : 100,
        modal: true,
        content: boxHtml,
        onComplete: function() {}
    });
    if (typeof options.callBack === 'function' && options.ok != null) {
        $('#alertBoxBTNYes').click(function() {
            options.callBack();
        });
    }
    if (typeof options.callBackClose === 'function') {
        $('#alertBoxBTNClose').click(function() {
            options.callBack();
            $.fancybox.close();
        });
    } else {
        $('#alertBoxBTNClose').click(function() {
            $.fancybox.close();
        });
    }
}
</script>
<!-- Load Facebook SDK for JavaScript -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
        xfbml: true,
        version: 'v3.3'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="150549311785593"
    logged_in_greeting="Xin chào, Trường học thông minh 789.vn có thể giúp gì cho bạn?"
    logged_out_greeting="Xin chào, Trường học thông minh 789.vn có thể giúp gì cho bạn?"></div>
<div id="myPopup" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">...</div>
    </div>
</div>
<div id="ajax-loading" class="modal-backdrop fade in hidden">
    <img src="https://cdn.789.vn/Content/nganhangdethi/img/loading.gif" />
    <div>
        <label>Nhấp double chuột để hủy.</label>
    </div>
</div>
<div class="modal fade" id="tinyPopup" tabindex="-1" role="dialog" aria-labelledby="tinyPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="tinyPopupLabel">[Title]</h4>
            </div>
            <div class="modal-body" id="tinyPopupBody">[body]</div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />


<style>
.datepicker-days {
    border: 1px solid black;
    border-radius: 4px;
}

.note {
    color: red;
}
</style>