<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <!--[if lt IE 8]>
    <script>
        window.location.href = 'static/browserHappy/browserHappy.html';
    </script>
    <![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <base href="<?php echo Config::$base_url; ?>">
    <title><?php echo $data['title']; ?></title>

    <meta content="index,follow" name="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta property="og:locale" content="en_EN">
    <meta property="og:type" content="article">
    <meta
        content="Luyện thi trắc nghiệm trực tuyến,trắc nghiệm online,thi trắc nghiệm online môn Toán, Lý, Hóa, Anh văn, sinh, lịch sử"
        name="keywords">
    <meta
        content="Luyện thi trắc nghiệm trực tuyến,trắc nghiệm online,thi trắc nghiệm online môn Toán, Lý, Hóa, Anh văn, sinh, lịch sử"
        name="description">
    <!--favicon in base64-->
    <link rel="icon" type="image/png" href="https://cdn.789.vn/Content/nganhangdethi/img/logo_new.png" />
    <link rel="apple-touch-icon" href="https://cdn.789.vn/Content/nganhangdethi/img/logo_new.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css -->
    <link href="public/simple2/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/simple2/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="public/simple2/css/flexslider.css" rel="stylesheet" />
    <link href="public/simple2/css/style.css" rel="stylesheet" />
    <link href="public/simple2/css/style2.css" rel="stylesheet" />
    <link href="public/simple2/css/swiper.min.css?v=1.0" rel="stylesheet" />
    <link href="public/simple2/css/dev.css?v=7.1" rel="stylesheet" />
    <link href="public/simple2/css/animate.css" rel="stylesheet" />
    <link href="public/simple2/css/hover-min.css" rel="stylesheet" />
    <!-- javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="public/simple2/js/jquery.min.js"></script>
    <script src="public/simple2/js/jquery.easing.1.3.js"></script>
    <script src="public/simple2/js/bootstrap.min.js"></script>
    <script src="public/simple2/js/jquery.fancybox.pack.js"></script>
    <script src="public/simple2/js/jquery.fancybox-media.js"></script>
    <script src="public/simple2/js/portfolio/jquery.quicksand.js"></script>
    <script src="public/simple2/js/portfolio/setting.js"></script>
    <script src="public/simple2/js/jquery.flexslider.js"></script>
    <script src="public/simple2/js/animate.js"></script>
    <script src="public/simple2/js/custom.js?v=7.1"></script>
    <script src="public/simple2/js/slider_swiper/swiper.min.js?v=1.0"></script>
    <script src="public/simple2/js/dev.js?v=7.1"></script>
    <script src="https://cdn.789.vn/Scripts/jquery.fullscreen-0.4.1.js"></script>
    <!-- <script src=" https://polyfill.io/v3/polyfill.min.js?features=es6 "></script> -->
    <script id="MathJax-script" async src=" https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js "></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
</head>

<body class="pageClass">
    <div class="fixed-contact-info">
        <div class="tel"></div>
        <a href="https://www.facebook.com/nganhangdethi/" target="_blank">
            <div class="fb hvr-grow"></div>
        </a>
    </div>
    <!-- Start Wrapper -->
    <div id="wrapper">
        <!-- Start Header -->
        <header id="header">
            <!-- Start Header Top-->
            <div class="header-top" style="background: linear-gradient(45deg, #DCEDC8 0, #81C784 100%);">
                <div class="container">
                    <div class="row rowHeader">
                        <div class="col-md-1 col-xs-12">
                        </div>
                        <!-- Start Logo -->
                        <div class="col-md-3 col-xs-4">
                            <h1>
                                <a href="<?php echo Config::$base_url; ?>">
                                    <img class="img-responsive hvr-pulse-grow" src="public/simple2/img/logo.png" alt=""
                                        style="width:120px; margin: 0 auto;">
                                </a>
                            </h1>
                        </div>
                        <!-- End Logo -->
                        <!-- Start Slogan -->
                        <div class="col-md-8 col-xs-8 logo">
                            <h1 style="cursor: pointer;">
                                <a href="#">
                                    <div id="banner-teacher" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img class="img-responsive"
                                                    src="https://cdn.789.vn/Content/nganhangdethi/img/huong_dan_giao_vien_1.png"
                                                    alt="">
                                            </div>

                                            <div class="item">
                                                <img class="img-responsive"
                                                    src="https://cdn.789.vn/Content/nganhangdethi/img/huong_dan_giao_vien.png"
                                                    alt="">
                                            </div>
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#banner-teacher" data-slide="prev"
                                            style="background-image: none;">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#banner-teacher" data-slide="next"
                                            style="background-image: none;">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </a>
                            </h1>
                            <h3 style="margin:0;padding:0;">
                                <a href="#"
                                    style="background-color: ivory;text-align:center;border: 1px solid green;padding: 3px;display: inline-block;width: 100%;">
                                    <img src="https://cdn.789.vn/Content/nganhangdethi/dailyexamimage/new1.gif"
                                        class="img-responsive img-daily" style="display:inline-block; width:40px;" />
                                    Hệ thống làm bài thi trực tuyến số I
                                    <img src="https://cdn.789.vn/Content/nganhangdethi/dailyexamimage/new1.gif"
                                        class="img-responsive img-daily" style="display:inline-block; width:40px;" />
                                </a>
                            </h3>
                        </div>
                        <!-- End Slogan -->

                        <!-- Start Right Header
                        <div class="col-md-3 text-center col-xs-12">
                            <div>
                                <div class="login-block">
                                    <div class="temp-block">
                                        <div class="login-container">
                                            <a id="aLinkAccInfo" style="display:none;" href="https://www.789.vn/thong-tin-tai-khoan.html"></a>
                                            <div class="div-ava" style="cursor:pointer;" onclick="window.location.href = 'https://www.789.vn/thong-tin-tai-khoan.html';">
                                                <div class="dropdown">
                                                    <a href="https://www.789.vn/thong-tin-tai-khoan.html">
                                                        <img class="fb-avatar-img dropbtn" style="border-radius:100px" src="https://cdn.789.vn/Content/nganhangdethi/img/avatar.png" />
                                                    </a>
                                                    <table cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td class="balance-text" style="color: #B71C1C;">TKKM: <strong>3,000</strong>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="dropdown-content">
                                                        <a href="https://www.789.vn/lop-hoc-da-tham-gia.html"> <i class="glyphicon glyphicon-list-alt icon-menu"></i><span>Đăng ký vào lớp học</span>
                                                        </a>
                                                        <a href="https://www.789.vn/moi-ban-cung-thi.html"> <i class="glyphicon glyphicon-user icon-menu"></i><span>Mời bạn cùng thi</span>
                                                        </a>
                                                        <a href="https://www.789.vn/lich-su-thi.html"> <i class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Lịch sử thi</span>
                                                        </a>
                                                        <hr style="margin: 0;">
                                                        <a href="https://www.789.vn/thong-tin-tai-khoan.html"> <i class="glyphicon glyphicon-info-sign icon-menu"></i><span>Thông tin tài khoản</span>
                                                        </a>
                                                        <a href="https://www.789.vn/nap-tien.html"> <i class="glyphicon glyphicon-usd icon-menu"></i><span>Nạp tiền</span>
                                                        </a>
                                                        <hr style="margin: 0;">
                                                        <a href="https://www.789.vn/thoat.html"> <i class="glyphicon glyphicon glyphicon-log-out icon-menu"></i><span>Đăng xuất</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         End Right Header -->
                    </div>
                </div>
            </div>
            <!-- End Header Top-->
        </header>
        <!-- End Header -->


    </div>
    <div id="wrapper" class="menu-wrapper">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top menu-navbar">
                <div class="container" style="padding:0;">
                    <img class="logo-phone-1" src="https://cdn.789.vn/Content/nganhangdethi/img/logo_new.png" alt=""
                        style="width:50px; margin: 1px auto;float:left">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav" style="width: 100%;">
                            <li class=""><a href="Home" style="font-size: 20px;"><span
                                        class="glyphicon glyphicon-home"></span></a>
                            </li>

                            <?php if(!isset($_SESSION['username'])){ ?>
                            <li><a href="Login">Đăng nhập</a></li>
                            <li><a href="Register">Đăng ký tài khoản</a></li>
                            <!-- <li><a href="Register/RegisterTeacher">Đăng ký giáo viên</a></li> -->

                            <?php }else{ ?>

                            <?php if ((isset($_SESSION["permission"]) && (int)$_SESSION["permission"] == 1)) {?>
                            <li><a href="Manager">Quản lý</a></li>
                            <?php  } 
                                elseif((isset($_SESSION["permission"]) && (int)$_SESSION["permission"] == 2)) {?>
                            -<li><a href="Teacher">Giáo viên</a></li>

                            <?php  }
                                elseif((isset($_SESSION["permission"]) && (int)$_SESSION["permission"] == 3)) {?>
                            <!-- <li><a href="Student/ListClass">Danh sách lớp học</li> -->
                            <li><a href="Student/ListClasses">Danh sách lớp học</a></li>
                            <li><a href="#">Xem lớp học đã tham gia</a></li>
                            <li><a href="Examination/viewListResultExam">Tra cứu kết quả</a></li>
                            <li><a href="#">Xem lịch sử thi</a></li>
                            <li><a href="Examination/findExam">Tham gia bài thi bằng ID</a></li>
                            <?php }?>
                            
                            <li><a href="Logout">Đăng xuất</a></li>
                            <?php } ?>

                            <!--
                            <li class="" style="background-color: #FF7043;" data-toggle="tooltip" title="Thông tin tài khoản cá nhân & các chức năng liên quan"><a href="https://www.789.vn/thong-tin-tai-khoan.html"><span class="glyphicon glyphicon-user"></span></a>
                            </li>

                            -->

                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

        <div class="container" style="margin-top:20px;">
            <!-- Start Body ne hihi -->
            <?php 

                if(isset($data["menu"])){

                    require_once "./app/views/pages/".$data["menu"].".php";

                }else{
                    require_once "./app/views/pages/".$data["Page"].".php";
                }
            ?>
            <!-- End Body ne hihi -->
        </div>

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

        <footer id="footer">
            <div class="wrap">
                <div class="footer-info row">
                    <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                        <h3 class="ftit">Về chúng tôi</h3>
                        <p>Bản quyền thuộc Công ty Cổ phần Công nghệ Giáo dục 247
                            <br>Một thành viên của Tổ chức giáo dục DuyBui Academy</p>
                        <p class="mb-4"> <strong>Chịu trách nhiệm nội dung: Tuong Vi</strong>
                            <br>12 Nguyễn Văn Bảo, Phường 4, Quận Gò Vấp, TPHCM</p>
                        <div class="mb-3">
                            <img src="https://cdn.789.vn/Content/789v2/img/common/icon-phone.png" alt="">082 30 80 507
                        </div>
                        <div>
                            <img src="https://cdn.789.vn/Content/789v2/img/common/icon-mail.png"
                                alt="">thanhdinhiuh@gmail.com</div>
                        <div style="top: 4px;" class="fb-share-button"
                            data-href="https://www.789.vn/dang-ky.html?refid=b6a8cff87cf40f43dbf7fb439a54fdca"
                            data-layout="button" data-size="large" data-mobile-iframe="true"></div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="footer-menu">
                            <div class="f-col-1 mb-4">
                                <h3 class="ftit">Những quy định</h3>
                                <p><a class="text-white" href="https://www.789.vn/quy-che-hoat-dong.html">Quy chế hoạt
                                        động</a>
                                </p>
                                <p><a class="text-white" href="https://www.789.vn/chinh-sach-bao-mat.html">Chính sách
                                        bảo mật</a>
                                </p>
                                <p><a class="text-white" href="https://www.789.vn/hinh-thuc-thanh-toan.html">Hình thức
                                        thanh toán</a>
                                </p>
                                <p><a class="text-white" href="https://www.789.vn/doi-tra-hoan-tien.html">Chính sách đổi
                                        trả, hoàn tiền</a>
                                </p>
                                <p><a class="text-white" href="https://www.789.vn/ru-ban-cung-hoc.html">Rủ bạn cùng
                                        học</a>
                                </p>
                                <p><a class="text-white" href="https://www.789.vn/lien-he.html">Liên hệ với
                                        ExamOnline247.vn</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-mail">
                    <div> <span class="pr-3">@789.vn</span> Nhập email để nhận tin tuyển sinh mới nhất</div>
                    <div class="input-mail">
                        <input class="input-text" type="text" placeholder="Họ tên" id="homeRegisterFullname"
                            value="nguuyen van a" style="display:none" />
                        <input class="input-text" type="text" name="" id="homeRegisterEmail"
                            placeholder="Nhập email tại đây">
                        <button class="btn btn-success btn-regist"
                            onclick="registerEmail('https://www.789.vn/Api/RegisterEmail', '#homeRegisterEmail', '#homeRegisterFullname')"></button>
                    </div>
                </div>
            </div>
        </footer>
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

    #button{
        display:block;
        margin:20px auto;
        padding:10px 30px;
        background-color:#eee;
        border:solid #ccc 1px;
      cursor: pointer;
    }
    #overlay{   
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height:100%;
        display: none;
        background: rgba(0,0,0,0.6);
    }
    .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;  
    }
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }
    @keyframes sp-anime {
        100% { 
            transform: rotate(360deg); 
        }
    }
    .is-hide{
        display:none;
    }
    </style>
    <script>

    $(document).ajaxSend(function(){

        if(window.location.href.search("Student/doExam") > -1)
            return;
        
        $("#overlay").fadeIn(300);　
    });

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
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
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
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src "https://cdn.datatables.net/plug-ins/1.10.15/sorting/stringMonthYear.js"></script>