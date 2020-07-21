<?php @$error=$data["error"];?>

<style>
header .navbar {
    min-height: 60px;
    padding: 0px;
}

.rowHeader {
    margin-bottom: 5px;
}

.input-regiser-email {
    color: black;
}

ul.navbar-nav li a {
    color: #fff !important;
}

.menu-navbar {
    background-color: #558B2F !important;
}

.menu-navbar {
    background-color: #6c9890 !important;
}

ul.navbar-nav li.active {
    background-color: #33691E !important;
}

ul.navbar-nav li:hover,
ul.navbar-nav li:hover a {
    background-color: #2c443e;
}
</style>
<script type="text/javascript">
function ClearCookie() {
    document.cookie = 'showblur' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;'
}
</script>


<!-- Start Wrapper -->

<div id="wrapper" class="menu-wrapper">
    <!-- start header -->

    <!-- end header -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

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


    <div class="text-center" id="borderForm" sytle="border:2px solid black; border-radius:4px;">
        <div class="row">
            <div class="text-center">
                <h2 class="pageTitle text-center">Yêu cầu vào lớp học</h2>
            </div>
            <?php 

                // var_dump($data);
                $isShowRequestForm = $data["isShowRequestForm"];
                if($isShowRequestForm=="true"){
            ?>

            <form class="form-horizontal" method="post" style="margin-top: 30px;">
                <!--Start General Info-->

                <!-- chon khoi -->
                <div class="form-group">
                    <label class="col-sm-2 text-center control-label" for=""><i class="glyphicon glyphicon-question-sign"></i>
                        ID lớp học</label>
                  
                    <div class="col-sm-8 text-center  <?php if(@$error["classId"] != "") echo "has-error"; ?>">
                        <input type="text" id="Title" name="classId" class="form-control text-center"
                            value="" required placeholder="ID lớp học.">
                        <?php if(@$error["classId"] != ""){ ?>
                        <span class="help-block"><?php echo @$error["classId"]?></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 text-center control-label" for="">
                        <i class="glyphicon glyphicon-barcode"></i> Mật khẩu
                    </label>
                    <div class="col-sm-8 <?php if(isset($error["password"])) echo "has-error";?>">
                        <input type="password"  id="PasswordJoinClass" name="PasswordJoinClass" class="form-control text-center"
                          required  placeholder="Mật khẩu vào lớp.">
                        <?php if(@$error["password"] != ""){ ?>
                        <span class="help-block"><?php echo @$error["password"]?></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 text-center" for=""></label>
                    <div class="col-sm-8 text-center">
                        <button class="btn btn-primary" type="submit" name="joinClass">Yêu cầu</button>
                        <a class="btn btn-primary" href="Student">Trở về</a>
                    </div>
                </div>
            </form>

            <?php }
                else{ ?>
                <h3 class="alert alert-warning" role="alert"> Vui lòng đợi giáo viên cho phép vào lớp.</h3>
            <?php } ?>
        </div>
        <!--End General Info-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    startValidate();
});

function startValidate() {
    $("#frmUpdate").validate({
        rules: {
            Title: {
                required: true
            },
            Passcode: {
                required: true
            },
            Contact_phone: {
                required: true
            },
            Contact_email: {
                required: true
            },
        },
        messages: {
            Title: "*",
            Passcode: "*",
            Contact_phone: "*",
            Contact_email: "*"
        },
        errorPlacement: function() {
            return true; // suppresses error message text
        }
    });
}
</script>

<script>
function empty(input) {
    return input == '' || input == undefined || input == null;
}
</script>

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