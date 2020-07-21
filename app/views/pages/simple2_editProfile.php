    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

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
            <h2 class="pageTitle" style="">Thông tin cá nhân</h2>
        </div>
    </section>


    <div class="">
        <form class="form-horizontal" id="frmUpdate" method="post" role="form"
            style="border: 1px solid black;border-radius: 4px;">

            <input type="hidden">
            <!--Start General Info-->
            <div class="general-info info-edit">

                <?php $user = $data["user"]; @$error=$data["error"]; 
                    // var_dump($error);
                ?>
                <div class="row text-center">
                    <div class="form-group col-sm-12">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9" style="color:red;font-weight:bold;">

                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-envelope"></i> Địa
                            chỉ Email<sub>*</sub></label>
                        <div class="col-sm-9">
                            <input type="text" id="email" name="email" class="form-control"
                                value="<?php echo $user["Email"];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-user"></i> Tên tài
                            khoản <sub>*</sub></label>
                        <div class="col-sm-9 <?php if($error["username"] != "") echo "has-error"; ?>">
                            <input type="text" id="Username" name="username" class="form-control"
                                value="<?php echo $user["Username"];?>">
                            <span class="help-block"><?php echo @$error["username"]?></span>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-user"></i> Họ
                            tên<sub>*</sub></label>
                        <div class="col-sm-9 <?php if($error["fullname"] != "") echo "has-error"; ?>">
                            <input type="text" id="Fullname" name="fullname" class="form-control"
                                value="<?php echo $user["FullName"];?>">
                            <span class="help-block"><?php echo @$error["fullname"]?></span>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-3 control-label" for=""><span class="glyphicon glyphicon-earphone"></span>
                            Điện thoại<sub>*</sub></label>
                        <div class="col-sm-9 <?php if($error["phoneNumber"] != "") echo "has-error"; ?>">
                            <input type="text" name="phoneNumber" class="form-control"
                                value="<?php echo $user["Phone"]; ?>">
                            <span class="help-block"><?php echo @$error["phoneNumber"]?></span>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="col-sm-3 control-label" for="" id="lblBirthday"><i
                                class="glyphicon glyphicon-calendar"></i> Ngày sinh<sub>*</sub></label>
                        <div class="col-sm-9 <?php if($error["birthday"] != "") echo "has-error"; ?>">
                            <input class="form-control hasDatepicker" type="text" name="birthday" id="Birthday"
                                value="<?php $birthday = new DateTime($user["Birthday"]); echo $birthday->format("m/d/Y"); ?>">
                            <script>
                            $(function() {
                                $("#Birthday").datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    yearRange: "-70:-14",
                                    dateFormat: "dd/mm/yy"
                                });
                                $("#lblBirthday").click(function() {
                                    $("#Birthday").val("");
                                });
                            });
                            </script>
                            <span class="help-block"><?php echo @$error["birthday"];?></span>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="updateProfile">Cập nhật</button>
                        <!-- <button class="btn btn-cancel" style="color:white;" type="reset">Nhập lại</button> -->
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

    //$(".fancybox").fancybox();
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
    <div class="modal fade" id="tinyPopup" tabindex="-1" role="dialog" aria-labelledby="tinyPopupLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span>
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