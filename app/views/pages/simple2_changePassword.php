<style>
.ban-tin-789 {
    background-color: #212121;
}
</style>
<form method="post" action="https://www.789.vn/thi.html" id="frmExam" name="frmExam">
    <div>
        <input type="hidden" id="ExamType" name="ExamType" value="thptqg" />
    </div>
    <input type="hidden" id="subjectId" name="subjectId" />
    <input type="hidden" id="hidden_class" name="hidden_class" value="3" />
    <input type="hidden" id="ExamType" name="ExamType" value="thptqg" />
</form>
<script>
function examNow(subjectId) {
    $('#subjectId').val(subjectId);
    $('#frmExam').submit();
}
</script>

<section id=" text-center" style="margin-bottom: 30px;">
    <div class="text-center">
        <h2 class="pageTitle" style="">Cập nhật mật khẩu</h2>
    </div>
</section>


<div class="">
    <form class="form-horizontal" id="frmUpdate" method="post" role="form"
        style="border: 1px solid black;border-radius: 4px;">

        <input type="hidden">
        <!--Start General Info-->
        <div class="general-info info-edit">

            <?php 
                @$error=$data["error"]; 
                // var_dump($error);
            ?>
            <div class="row text-center">
                <div class="form-group col-sm-12">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9" style="color:red;font-weight:bold;">

                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-lock"></i>Mật khẩu hiện
                        tại</label>
                    <div class="col-sm-9 <?php if(isset($error["passwordCurrent"])) echo "has-error";?>">
                        <input type="password" id="email" name="passwordCurrent" class="form-control">
                        <span class="help-block"><?php echo $error["passwordCurrent"];?></span>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-lock"></i>Mật khẩu
                        mới</label>
                    <div class="col-sm-9 <?php if(isset($error["password"])) echo "has-error";?>">
                        <input type="password" id="email" name="password" class="form-control">
                        <span class="help-block"><?php echo $error["password"];?></span>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-lock"></i>Nhập lại mật
                        khẩu mới</label>
                    <div class="col-sm-9 <?php if(isset($error["repassword"])) echo "has-error";?>">
                        <input type="password" id="email" name="repassword" class="form-control">
                        <span class="help-block"><?php echo $error["repassword"];?></span>
                    </div>
                </div>


                <div class="text-center">
                    <button class="btn btn-primary" type="submit" name="updatePassword">Cập nhật</button>
                </div>

            </div>
        </div>
        <!--End General Info-->
    </form>

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

<style>
.note {
    color: red;
}
</style>