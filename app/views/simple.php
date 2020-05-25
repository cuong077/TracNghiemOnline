<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo Config::$base_url; ?>">
    <title><?php echo $data['title']; ?></title>


    <!-- Css Styles -->
    <script src="public/simple/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="public/simple/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="public/simple/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="" style="margin-top: 20px;">
                        <a href=""><img src="public/simple/img/home_logo.png" width="50%" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>

                                <li class=""><a href="Home">Trang chủ</a></li>
                                
                                <?php if(!isset($_SESSION['username'])){ ?>
                                <li><a href="Login">Đăng nhập</a></li>
                                <li><a href="Register">Đăng ký</a></li>

                                <?php }else{ ?>
                          
                                <?php if ((isset($_SESSION["permission"]) && ((int)$_SESSION["permission"] == 3 || (int)$_SESSION["permission"] == 2) )) {?>
                                            <li><a href="Manager">Quản lý</a></li>
                                <?php  } ?>
                                <li><a href="Examination/viewListResultExam">Tra cứu kết quả</a></li>
                                <li><a href="Examination">Xem danh sách bài thi</a></li>
                                <li><a href="Examination/findExam">Tham gia bài thi bằng ID</a></li>
                                <li><a href="Logout">Đăng xuất</a></li>
                                <?php } ?>

                            <!--
                                <li><a href="login.html">Đăng Nhập</a>
                                    <ul class="dropdown">
                                        <li>
                                        <a href="#">Xem hồ sơ</a> </li>
                                        <li><a href="#">Đăng xuất</a></li>
                                    </ul>
                                </li>

                            -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->



<?php require_once "./app/views/pages/".$data["Page"].".php" ?>



  

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="public/simple/img/footer-logo.png" alt=""></a>
                        </div>
                        <p>Học học nữa , học mãi ...</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <span>Số điện thoại :</span>
                                <p>(+84) 999 9999 </p>
                            </li>
                            <li>
                                <span>Email:</span>
                                <p>info.colorlib@gmail .com</p>
                            </li>
                            <li>
                                <span>Fax:</span>
                                <p>(+84) 999 9999 </p>
                            </li>
                            <li>
                                <span>Mạng xã hội :</span>
                                <div class="footer__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__widget">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">How it work</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">How it Work</a></li>
                            <li><a href="#">Advantages</a></li>
                            <li><a href="#">Direo App</a></li>
                            <li><a href="#">Packages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="footer__copyright__links">
                            <a href="#">Terms</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    
    <script src="public/simple/js/bootstrap.min.js"></script>
    <script src="public/simple/js/jquery.nice-select.min.js"></script>
    <script src="public/simple/js/jquery-ui.min.js"></script>
    <script src="public/simple/js/jquery.nicescroll.min.js"></script>
    <script src="public/simple/js/jquery.barfiller.js"></script>
    <script src="public/simple/js/jquery.magnific-popup.min.js"></script>
    <script src="public/simple/js/jquery.slicknav.js"></script>
    <script src="public/simple/js/owl.carousel.min.js"></script>
    <script src="public/simple/js/main.js"></script>
</body>

</html>