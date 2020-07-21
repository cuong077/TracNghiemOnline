<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- <h2 class="pageTitle">Quản lí của giáo viên</h2> -->
            </div>
        </div>
    </div>
</section>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!--Start My Account-->
                <style>
                .menu-main-item {
                    background-color: #3F51B5;
                    color: white;
                    padding-left: 5px;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: center;
                }

                .menu-main-item:hover {
                    background-color: #3949AB;
                }
                </style>
                <div class="my-account">
                    <ul class="ul-sub-menu" style="padding-left: 15px;">
                        <li class="li-sub-menu list-style-none menu-main-item"> <span class="text-uppercase">Giáo
                                Viên</span>
                        </li>
                        <li class="li-sub-menu list-style-none">
                            <a href="Teacher/createQuestion"> <i
                                    class="glyphicon glyphicon-folder-open icon-menu"></i><span>Thêm câu hỏi cho bài
                                    học</span>
                            </a>
                        </li>
                        <li class="li-sub-menu list-style-none" id="dang-ky-day-kem">
                            <a href="Teacher/CreateClass"> <i
                                    class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Tạo lớp</span>
                            </a>
                        </li>

                        <li class="li-sub-menu list-style-none" id="dang-ky-day-kem">
                            <a href="Teacher/ListClasses"> <i
                                    class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Xem danh sách
                                    lớp</span>
                            </a>
                        </li>


                        <li class="li-sub-menu list-style-none" id="dang-ky-day-kem">
                            <a href="Teacher/createExamSelection"> <i
                                    class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Tạo đề thi</span>
                            </a>
                        </li>

                        <li class="li-sub-menu list-style-none" id="dang-ky-day-kem">
                            <a href="#"> <i class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Xem danh sách đề
                                    thi</span>
                            </a>
                        </li>

                        <li class="li-sub-menu list-style-none" id="dang-ky-day-kem">
                            <a href="Teacher/ListStudentsRequest"> <i
                                    class="glyphicon glyphicon-sunglasses icon-menu"></i><span>Duyệt học sinh vào
                                    lớp</span>
                            </a>
                        </li>


                        <li class="li-sub-menu list-style-none menu-main-item"> <span class="text-uppercase">Tài
                                khoản</span>
                        </li>
                        <li class="li-sub-menu list-style-none" id="thong-tin-tai-khoan">
                            <a href="Profile/EditProfile"> <i
                                    class="glyphicon glyphicon-info-sign icon-menu"></i><span>Thông tin tài
                                    khoản</span>
                            </a>
                        </li>
                        <li class="li-sub-menu list-style-none" id="thong-tin-tai-khoan">
                            <a href="Profile/ChangePassword"> <i
                                    class="glyphicon glyphicon-info-sign icon-menu"></i><span>Thay đổi mật khẩu</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <script>
                $(document).ready(function() {
                    var url = window.location.href;
                    //doi tac start
                    $('.li-sub-menu').removeClass('sub-menu-active');
                    if (url.indexOf('affiliate') > 0) {
                        $('#affiliate').addClass('sub-menu-active');
                    }
                    $('.li-sub-menu').removeClass('sub-menu-active');
                    if (url.indexOf('affiliate-summary') > 0) {
                        $('#affiliate-summary').addClass('sub-menu-active');
                    }
                    $('.li-sub-menu').removeClass('sub-menu-active');
                    if (url.indexOf('affiliate-detail') > 0) {
                        $('#affiliate-detail').addClass('sub-menu-active');
                    }
                    $('.li-sub-menu').removeClass('sub-menu-active');
                    if (url.indexOf('affiliate-payment') > 0) {
                        $('#affiliate-payment').addClass('sub-menu-active');
                    }
                    //doi tac end

                    $('.li-sub-menu').removeClass('sub-menu-active');
                    if (url.indexOf('thong-tin-tai-khoan') > 0) {
                        $('#thong-tin-tai-khoan').addClass('sub-menu-active');
                    }
                    if (url.indexOf('cap-nhat-tai-khoan') > 0) {
                        $('#cap-nhat-tai-khoan').addClass('sub-menu-active');
                    }
                    if (url.indexOf('doi-mat-khau') > 0) {
                        $('#doi-mat-khau').addClass('sub-menu-active');
                    }
                    if (url.indexOf('thoat') > 0) {
                        $('#thoat').addClass('sub-menu-active');
                    }
                    if (url.indexOf('nhap-ma-khuyen-mai') > 0) {
                        $('#nhap-ma-khuyen-mai').addClass('sub-menu-active');
                    }
                    if (url.indexOf('lich-su-thi') > 0) {
                        $('#lich-su-thi').addClass('sub-menu-active');
                    }
                    if (url.indexOf('lich-su-nap-tien') > 0) {
                        $('#lich-su-nap-tien').addClass('sub-menu-active');
                    }
                    if (url.indexOf('moi-ban-cung-thi') > 0) {
                        $('#moi-ban-cung-thi').addClass('sub-menu-active');
                    }
                    if (url.indexOf('buy-package.html') > 0) {
                        $('#goi-thi-hs').addClass('sub-menu-active');
                    }
                    //if (url.indexOf('nap-tien') > 0) {
                    //    $('#nap-tien').addClass('sub-menu-active');
                    //}
                    if (url.indexOf('cau-truc-de-thi') > 0) {
                        $('#cau-truc-de-thi').addClass('sub-menu-active');
                    }
                    if (url.indexOf('danh-sach-lop-hoc') > 0 || url.indexOf('danh-sach-bai-kiem-tra') > 0) {
                        $('#danh-sach-lop-hoc').addClass('sub-menu-active');
                    }
                    if (url.indexOf('danh-sach-de-thi') > 0 || url.indexOf('danh-sach-chuong.html') > 0 || url
                        .indexOf('tao-chuong.html') > 0 || url.indexOf('tao-de-thi-theo-lo.html') > 0) {
                        $('#danh-sach-de-thi').addClass('sub-menu-active');
                    }
                    if (url.indexOf('lop-hoc-da-tham-gia') > 0 || url.indexOf('dang-ky-lop-hoc') > 0) {
                        $('#lop-hoc-da-tham-gia').addClass('sub-menu-active');
                    }

                    if (url.indexOf('danh-sach-bo-de') > 0 || url.indexOf('bo-de') > 0 || url.indexOf(
                            'tao-cau-truc-de-thi-v1.html') > 0 || url.indexOf('cau-truc-de-thi.html') > 0) {
                        $('#danh-sach-bo-de').addClass('sub-menu-active');
                    }
                    if (url.indexOf('huong-dan-chung-10') > 0 || url.indexOf('huong-dan-chung-10') > 0) {
                        $('#huong-dan-chung-10').addClass('sub-menu-active');
                    }
                });
                </script>
                <!--End My Account-->
            </div>
            <div class="col-md-9">
                <?php require_once "./app/views/pages/".$data["Page"].".php"; ?>
            </div>
        </div>
    </div>
</div>