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


<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Đăng ký làm giáo viên</h2>
            </div>
        </div>
    </div>
</section>

<div id="content">
    <div class="container">
        <div class="row">

            <form class="form-horizontal" id="frmUpdate" method="post" role="form">
                <!--Start General Info-->
                <div class="general-info info-edit">

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9" style="color:red;font-weight:bold;">

                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-user"></i> Họ
                                tên<sub>*</sub></label>
                            <div class="col-sm-9">
                                <input type="text" id="Fullname" name="Fullname" class="form-control" value="Duc Bui">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-phone"></i>
                                Điện thoại<sub>*</sub></label>
                            <div class="col-sm-9">

                                <input type="number" id="Cell_phone" name="Cell_phone" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-envelope"></i>
                                Email<sub>*</sub></label>
                            <div class="col-sm-9">
                                <input type="text" id="Email" name="Email" class="form-control"
                                    value="ducduy230899@gmail.com">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for="" id="lblBirthday"><i
                                    class="glyphicon glyphicon-calendar"></i> Ngày sinh<sub>*</sub></label>
                            <div class="col-sm-9">
                                <input class="form-control hasDatepicker" type="text" name="Birthday" id="Birthday"
                                    value="01/01/2005">
                                <script>
                                $(function() {
                                    $("#Birthday").datepicker({
                                        //showSecond: true,
                                        //timeFormat: ""hh:mm:ss",
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
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-heart"></i>
                                Quý danh<sub>*</sub></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="Gender" id="Gender">
                                    <option value="M">Thầy</option>
                                    <option value="F">Cô</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-home"></i>
                                Trường<sub>*</sub></label>

                            <div class="col-sm-9">
                                <input type="text" id="Billing_address" name="Billing_address" class="form-control"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""><i class="glyphicon glyphicon-inbox"></i>
                                Tỉnh/Tp<sub>*</sub></label>

                            <div class="col-sm-9">
                                <select class="form-control" name="Province_id" id="Province_id">
                                    <option value="0"></option>
                                    <option value="89">An Giang</option>
                                    <option value="6">Bắc Cạn</option>
                                    <option value="24">Bắc Giang</option>
                                    <option value="95">Bạc Liêu</option>
                                    <option value="27">Bắc Ninh</option>
                                    <option value="83">Bến Tre</option>
                                    <option value="52">Bình Định</option>
                                    <option value="74">Bình Dương</option>
                                    <option value="70">Bình Phước</option>
                                    <option value="60">Bình Thuận</option>
                                    <option value="96">Cà Mau</option>
                                    <option value="92">Cần Thơ</option>
                                    <option value="4">Cao Bằng</option>
                                    <option value="97">Đà Nẵng</option>
                                    <option value="66">DakLak</option>
                                    <option value="67">DakNông</option>
                                    <option value="11">Điện Biên</option>
                                    <option value="75">Đồng Nai</option>
                                    <option value="87">Đồng Tháp</option>
                                    <option value="64">Gia Lai</option>
                                    <option value="2">Hà Giang</option>
                                    <option value="35">Hà Nam</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="42">Hà Tĩnh</option>
                                    <option value="30">Hải Dương</option>
                                    <option value="31">Hải Phòng</option>
                                    <option value="93">Hậu Giang</option>
                                    <option value="79">Hồ Chí Minh</option>
                                    <option value="17">Hòa Bình</option>
                                    <option value="33">Hưng Yên</option>
                                    <option value="56">Khánh Hòa</option>
                                    <option value="91">Kiên Giang</option>
                                    <option value="62">Kon Tum</option>
                                    <option value="12">Lai Châu</option>
                                    <option value="68">Lâm Đồng</option>
                                    <option value="20">Lạng Sơn</option>
                                    <option value="10">Lào Cai</option>
                                    <option value="80">Long An</option>
                                    <option value="36">Nam Định</option>
                                    <option value="40">Nghệ An</option>
                                    <option value="37">Ninh Bình</option>
                                    <option value="58">Ninh Thuận</option>
                                    <option value="25">Phú Thọ</option>
                                    <option value="54">Phú Yên</option>
                                    <option value="44">Quảng Bình</option>
                                    <option value="49">Quảng Nam</option>
                                    <option value="51">Quảng Ngãi</option>
                                    <option value="22">Quảng Ninh</option>
                                    <option value="45">Quảng Trị</option>
                                    <option value="94">Sóc Trăng</option>
                                    <option value="14">Sơn La</option>
                                    <option value="72">Tây Ninh</option>
                                    <option value="34">Thái Bình</option>
                                    <option value="19">Thái Nguyên</option>
                                    <option value="38">Thanh Hóa</option>
                                    <option value="46">Thừa Thiên Huế</option>
                                    <option value="82">Tiền Giang</option>
                                    <option value="84">Trà Vinh</option>
                                    <option value="8">Tuyên Quang</option>
                                    <option value="86">Vĩnh Long</option>
                                    <option value="26">Vĩnh Phúc</option>
                                    <option value="77">Vũng Tàu</option>
                                    <option value="15">Yên Bái</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label" for=""></label>

                            <div class="col-sm-9" style="color:red;">
                                <input type="hidden" id="Group_id" name="Group_id" value="2">
                                Để sử dụng các chức năng của Giáo viên. <br>
                                Quý thầy cô vui lòng điền đầy đủ, chính xác thông tin liên lạc và nhấn nút
                                Đăng ký.<br>
                                789.vn sẽ liên hệ và hoàn tất thủ tục kích hoạt tài khoản trong vòng 48h làm
                                việc.
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3" for=""></label>
                            <div class="col-sm-9">
                                <button class="btn btn-primary" type="submit">Đăng ký</button>
                                <button class="btn btn-cancel" type="reset" style="color:white;">Nhập lại</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--End General Info-->
            </form>
        </div>

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
</body>

</html>