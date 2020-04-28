
<?php

    $categorymodel = $this->model("CategoryModel");

    $category_list = $categorymodel->getAllCategory();

?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-431:41-->

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $data["title"]; ?></title>
    <base href="<?php echo Config::$base_url; ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="public/simple/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/simple/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="public/simple/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="public/simple/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="public/simple/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="public/simple/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="public/simple/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="public/simple/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="public/simple/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="public/simple/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="public/simple/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="public/simple/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="public/simple/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="public/simple/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="public/simple/css/responsive.css">

    <link rel="stylesheet" href="public/simple/css/alertify.core.css">

    <link rel="stylesheet" href="public/simple/css/alertify.default.css">

    <script src="public/simple/js/alertify.min.js"></script>

    
    
     <!-- jQuery-V1.12.4 -->
     <script src="public/simple/js/vendor/jquery-1.12.4.min.js"></script>

     <script src="public/simple/js/jquery.cookie.js"></script>
    <!-- Modernizr js -->
    <script src="public/simple/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header class="li-header-4">
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Hotline:</span><a href="#"> 1900636467</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <?php if($this->is_Login()){ ?>

                                    <li>
                                        <div class="ht-setting-trigger"><span><?php echo $_SESSION['username']; ?></span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                <?php if($this->is_Admin() || $this->is_Employee()){ ?>

                                                    <li><a href="Manager">Quản trị</a></li>

                                                <?php } ?>
                                                <li><a href="Logout">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3" style="padding-left:80px;">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="Home">
                                    <img src="public/uploads/logo.png" style="width :50%;" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15" style="padding-top:25px;">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="#" class="hm-searchbox">
                                <select class="nice-select select-search-category">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Sách Tâm lí xã hội</option>
                                    <option value="2">- - - - tên sách ở đây</option>
                                    <option value="3">Sách Khoa học viên tưởng</option>
                                    <option value="4">- - - - tên sách ở đây</option>
                                    <option value="5">Sách Lịch sử,Sử thi</option>
                                    <option value="6">- - - - tên sách ở đây</option>
                                    <option value="7">Sách Chính trị và Kinh tế</option>
                                    <option value="8">- - - - tên sách ở đây</option>
                                    <option value="7">Tiểu thuyết,truyện ngắn</option>
                                    <option value="8">- - - - tên sách ở đây</option>
                                    <option value="9">Sách văn học nghệ thuật</option>
                                    <option value="10">- - - - tên sách ở đây</option>
                                    <option value="11">Phụ kiện</option>
                                </select>
                                <input type="text" placeholder="Nhập sách bạn cần tìm ở đây...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <!-- Begin Header Middle Wishlist Area -->
                                  
                                    <!-- Header Middle Wishlist Area End Here -->
                                    <!-- Begin Header Mini Cart Area -->
                                    <li class="hm-minicart">
                                        <?php

                                            $total_price = 0;

                                            $total_quantity = 0;

                                            if(isset($_COOKIE['cart'])){

                                                $string_cart = base64_decode($_COOKIE['cart']);

                                                $cart = json_decode($string_cart);

                                                $product_model = $this->model("ProductModel");

                                                

                                                $items = [];

                                                foreach ($cart as $item){

                                                    $result = $product_model->getProduct($this->clear($item->productID));

                                                    if($result){
                                                        if(mysqli_num_rows($result) > 0){

                                                            $row = mysqli_fetch_array($result);

                                                            $row["quantity"] = (int)$item->quantity;

                                                            $items[] = $row;

                                                            $total_quantity += (int)$item->quantity;

                                                            $total_price += $row["price"] * (int)$item->quantity;

                                                        }
                                                    }
                                                    

                                                }
                                            }

                                         ?>
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text"><span class="total_price"><?php echo $total_price; ?></span> VNĐ
                                                <span class="cart-item-count"><?php echo $total_quantity; ?></span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <ul class="minicart-product-list">
                                                <?php
                                                    if(isset($items)){
                                                        foreach ($items as $item){
                                                ?>
                                                    <li class='product-id-<?php echo $item['id']; ?>'>
                                                        <a href="Product/Detail/<?php echo $item['id']; ?>" class="minicart-product-image">
                                                            <img src="<?php echo explode('|', $item["images"])[0]; ?>" alt="cart products">
                                                                     </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="Product/Detail/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h6>
                                                            <span><span class='product-price'><?php echo $item['price']; ?></span> VNĐ x <span class='quantity'><?php echo $item['quantity']; ?><span></span>
                                                        </div>
                                                        <button class="close">
                                                            <i class="fa fa-close" onclick='removeCart(this);'></i>
                                                        </button>
                                                    </li>
                                                <?php
                                                        }
                                                    }
                                                 ?>
                                            </ul>
                                            <p class="minicart-total">Tổng tiền: <span>VNĐ</span><span class="total_price"><?php echo $total_price; ?></span> </p>
                                            <div class="minicart-button">
                                                <a href="checkout.html"
                                                    class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                    <span>Xem Giỏ Hàng</span>
                                                </a>
                                                <a href="checkout.html"
                                                    class="li-button li-button-fullwidth li-button-sm">
                                                    <span>Thanh Toán</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Middle Area End Here -->
            <!-- Begin Header Bottom Area -->
            <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Header Bottom Menu Area -->
                            <div class="hb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="Home">TRANG CHỦ</a></li>

                                        <li class="dropdown-holder"><a href="#">DANH MỤC SẢN PHẨM</a>
                                               <ul class="hb-dropdown">
                                               <?php 
                                                    while($category = mysqli_fetch_array($category_list)){
                                               ?>
                                                   <li><a href="Home/showCategory/<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></a></li>
                                               
                                                <?php 
                                                    }
                                                ?>
                                               
                                               </ul>
                                           </li>

                                        <li><a href="Register">LIÊN HỆ</a></li>

                                        <?php if(!$this->is_Login()){ ?>

                                        <li><a href="Login">ĐĂNG NHẬP</a></li>

                                        <li><a href="Register">ĐĂNG KÝ</a></li>

                                        <?php } ?>


                                        
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Bottom Menu Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom Area End Here -->
            <!-- Begin Mobile Menu Area -->
            <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                <div class="container">
                    <div class="row">
                        <div class="mobile-menu">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End Here -->
        </header>
        <!-- Header Area End Here -->
        <!-- Begin Slider With Banner Area -->
        <div class="body-wrapper" style="margin-bottom: 70px;">

            <?php require_once "./app/views/pages/".$data["Page"].".php" ?>

        </div>
    <div class="footer">
            <!-- Begin Footer Static Top Area -->
            
            <!-- Footer Static Top Area End Here -->
            <!-- Begin Footer Static Middle Area -->
            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row">
                            <!-- Begin Footer Logo Area -->
                            <div class="col-lg-4 col-md-6" style="text-align:center;">
                                <div class="footer-logo">
                                 <img src="public/uploads/logo.png" style="width :30%;" alt="">
                                    
                                </div>
                                <ul class="des">
                                    <li>
                                        <span>Địa chỉ: </span>
                                        387-389 Hai Bà Trưng Quận 3 TP HCM - Công Ty Cổ Phần Phát Hành Sách TP HCM
                                    </li>
                                    <li>
                                        <span>Số điện thoại: </span>
                                        <a href="#">1900636467</a>
                                    </li>
                                    <li>
                                        <span>Email: </span>
                                        <a href="mailto://info@yourdomain.com">info@dc.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">DỊCH VỤ</h3>
                                    <ul>
                                        <li><a href="#">Điều khoản sử dụng</a></li>
                                        <li><a href="#">Chính sách bảo mật</a></li>
                                        <li><a href="#">Giới thiệu DC</a></li>
                                        <li><a href="#">Hệ thống trung tâm - nhà sách</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">HỖ TRỢ</h3>
                                    <ul>
                                        <li><a href="#">Chính sách đổi - trả - hoàn tiền</a></li>
                                        <li><a href="#">Chính sách khách sỉ</a></li>
                                        <li><a href="#">Phương thức vận chuyển</a></li>
                                        <li><a href="#">Phương thức thanh toán</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-4">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Theo dõi DC</h3>
                                    <ul class="social-link">
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank"
                                                title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="rss">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank"
                                                title="RSS">
                                                <i class="fa fa-rss"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip"
                                                target="_blank" title="Google +">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank"
                                                title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank"
                                                title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank"
                                                title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Begin Footer Newsletter Area -->
                               
                                <!-- Footer Newsletter Area End Here -->
                            </div>
                            <!-- Footer Block Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Static Middle Area End Here -->
            <!-- Begin Footer Static Bottom Area -->
            <div class="footer-static-bottom pt-55 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Footer Links Area -->
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Copyright © 2019 . D&C</a></li>  
                                </ul>
                            </div>
                            <!-- Footer Links Area End Here -->
                            <!-- Begin Footer Payment Area -->
                            <div class="copyright text-center">
                                <a href="#">
                                    <img src="images/payment/1.png" alt="">
                                </a>
                            </div>
                            <!-- Footer Payment Area End Here -->
                            <!-- Begin Copyright Area -->
                           
                            <!-- Copyright Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Static Bottom Area End Here -->
        </div>
        <!-- Footer Area End Here -->
        <!-- Begin Quick View | Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <!-- Product Details Left -->
                                <div class="product-details-left">
                                    <div class="product-details-images slider-navigation-1">
                                        <div class="lg-image">
                                            <img src="images/product/large-size/1.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="images/product/large-size/2.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="images/product/large-size/3.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="images/product/large-size/4.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="images/product/large-size/5.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="images/product/large-size/6.jpg" alt="product image">
                                        </div>
                                    </div>
                                    <div class="product-details-thumbs slider-thumbs-1">
                                        <div class="sm-image"><img src="images/product/small-size/1.jpg"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img src="images/product/small-size/2.jpg"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img src="images/product/small-size/3.jpg"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img src="images/product/small-size/4.jpg"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img src="images/product/small-size/5.jpg"
                                                alt="product image thumb"></div>
                                        <div class="sm-image"><img src="images/product/small-size/6.jpg"
                                                alt="product image thumb"></div>
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="product-details-view-content pt-60">
                                    <div class="product-info">
                                        <h2>Today is a good day Framed poster</h2>
                                        <span class="product-details-ref">Reference: demo_15</span>
                                        <div class="rating-box pt-20">
                                            <ul class="rating rating-with-review-item">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="review-item"><a href="#">Read Review</a></li>
                                                <li class="review-item"><a href="#">Write Review</a></li>
                                            </ul>
                                        </div>
                                        <div class="price-box pt-20">
                                            <span class="new-price new-price-2">$57.98</span>
                                        </div>
                                        <div class="product-desc">
                                            <p>
                                                <span>100% cotton double printed dress. Black and white striped top and
                                                    orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. quibusdam corporis, earum facilis et
                                                    nostrum dolorum accusamus similique eveniet quia pariatur.
                                                </span>
                                            </p>
                                        </div>
                                        <div class="product-variants">
                                            <div class="produt-variants-size">
                                                <label>Dimension</label>
                                                <select class="nice-select">
                                                    <option value="1" title="S" selected="selected">40x60cm</option>
                                                    <option value="2" title="M">60x90cm</option>
                                                    <option value="3" title="L">80x120cm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="single-add-to-cart">
                                            <form action="#" class="cart-quantity">
                                                <div class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </div>
                                                <button class="add-to-cart" type="submit">Add to cart</button>
                                            </form>
                                        </div>
                                        <div class="product-additional-info pt-25">
                                            <a class="wishlist-btn" href="wishlist.html"><i
                                                    class="fa fa-heart-o"></i>Add to wishlist</a>
                                            <div class="product-social-sharing pt-25">
                                                <ul>
                                                    <li class="facebook"><a href="#"><i
                                                                class="fa fa-facebook"></i>Facebook</a></li>
                                                    <li class="twitter"><a href="#"><i
                                                                class="fa fa-twitter"></i>Twitter</a></li>
                                                    <li class="google-plus"><a href="#"><i
                                                                class="fa fa-google-plus"></i>Google +</a></li>
                                                    <li class="instagram"><a href="#"><i
                                                                class="fa fa-instagram"></i>Instagram</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View | Modal Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
   
    <!-- Popper js -->
    <script src="public/simple/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="public/simple/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="public/simple/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="public/simple/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="public/simple/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="public/simple/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="public/simple/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="public/simple/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="public/simple/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="public/simple/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="public/simple/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="public/simple/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="public/simple/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="public/simple/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="public/simple/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="public/simple/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="public/simple/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="public/simple/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="public/simple/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="public/simple/js/main.js"></script>
    <script type="text/javascript">
        
        function addToCart(e, t) {

            alertify.success("Thêm thành công");

           e.preventDefault();

           var product_name = $($(t).siblings("input[name=product-name]")[0]).attr("value");
           var product_image = $($(t).siblings("input[name=product-image]")[0]).attr("value");
           var product_price = parseInt($($(t).siblings("input[name=product-price]")[0]).attr("value"));
           var product_id = $($(t).siblings("input[name=product-id]")[0]).attr("value");
           var product_quantity = parseInt($($(t).siblings("input[name=product-quantity]")[0]).attr("value"));

           if($(".minicart-product-list").find('.product-id-'+product_id).length > 0){

                var quantity = $($(".minicart-product-list").find('.product-id-'+product_id)[0]).find(".quantity");

                $(quantity).text(parseInt($(quantity).text()) + product_quantity);

                var item = { productID : product_id, quantity : product_quantity };
                
                addCookieCart(item);

           }else{

                $(".minicart-product-list").append(
                    `
                   <li class='product-id-`+product_id+`'>
                        <a href="Product/Detail/`+product_id+`" class="minicart-product-image">
                            <img src="`+product_image+`"     alt="cart products">
                         </a>
                        <div class="minicart-product-details">
                        <h6><a href="Product/Detail/`+product_id+`">`+product_name+`</a></h6>
                          <span><span class='product-price'>`+product_price+`</span> VNĐ x <span class='quantity'>`+product_quantity+`<span></span>
                        </div>
                        <button class="close">
                            <i class="fa fa-close" onclick='removeCart(this);'></i>
                        </button>
                    </li>
                   `
                );

                var item = { productID : product_id, quantity : product_quantity };

                addCookieCart(item);
           }
           updateCart();
        }

        function removeCart(t){
            $($(t).closest('li')[0]).remove();
            var product_id = $($(t).closest('li')[0]).attr("class").replace('product-id-', '');
            removeCookieCart({productID : product_id});
            console.log(product_id);
            updateCart();
        }

        function updateCart(){
            var total_quantity = 0;
            $(".minicart-product-list .quantity").each(function(){
                total_quantity += parseInt($(this).text());
            });
            $(".cart-item-count").text(total_quantity);


            var total_price = 0;
            $(".minicart-product-list .product-price").each(function(){
                total_price += parseInt($(this).text())*parseInt($($(this).siblings('.quantity')[0]).text());
            });
            $(".total_price").text(total_price);
        }

        function getCookieCart(){
            return JSON.parse(atob($.cookie("cart")));
        }

        function addCookieCart(item){
            var items = [];
            try{
                items = getCookieCart();
            }catch(error){}
            
            var index = items.findIndex(x => x.productID == item.productID);

            if(index != -1){
                items[index].quantity+=item.quantity;
            }else{
                items.push(item);
            }
            $.cookie("cart", btoa(JSON.stringify(items)), { expires: 30, path : '/' });
        }

        function removeCookieCart(item){
            var items = [];
            try{
                items = getCookieCart();
            }catch(error){}
            
            var index = items.findIndex(x => x.productID == item.productID);

            if(index != -1){
                items.splice(index , 1);
            }
            $.cookie("cart", btoa(JSON.stringify(items)), { expires: 30, path : '/' });
        }


    </script>
</body>

<!-- index-431:47-->

</html>