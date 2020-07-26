<div id="wrapper" class="menu-wrapper">
    <!-- start header -->
    <style>
    .ban-tin-789 {
        background-color: #212121;
    }

    /* 
    tr {
        cursor: pointer;
    } */
    </style>

    <section id=" text-center" style="margin-bottom:20px;">
        <div class="text-center">
            <h2 class="pageTitle" style="">Lớp đã tham gia</h2>
        </div>
    </section>

    <div class="row">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr class="text-center">
                    <th class="col-lg-1 text-center">STT</th>
                    <th class="col-lg-2 text-center">Tên lớp học</th>
                    <th class="col-lg-2 text-center">Mô tả</th>
                    <th class="col-lg-2 text-center">Khối lớp</th>
                    <th class="col-lg-2 text-center">Giáo viên</th>
                    <th class="col-lg-1 text-center">Sỉ số</th>
                    <th class="col-lg-2 text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    @$classes = $data["classes"];

                    if(count($classes) > 0){
                    $index=0;

                    foreach ($classes as $class){
                        $index++;
                ?>

                <tr id="Class_<?php echo $class[0];?>">
                    <td class="text-center"><?php echo $index;?></td>
                    <td class="text-center">
                        <?php echo $class[1];?>
                    </td>
                    <td class="text-center"><?php echo $class[2];?></td>
                    <td class="text-center">
                        <?php
                        echo $class[3];
                    ?>
                    </td>
                    <td class="text-center"> <?php echo $class[4]; ?> </td>
                    <td class="text-center"><?php echo $class[5]; ?></td>
                    <td class="text-center">
                        <a href="Student/ListResourceClass/<?php echo $class[0]; ?>"
                            class="btn btn-success">Xem</a>
                    </td>
                </tr>
                <?php }} else{
                    ?>
                <tr>
                    <td colspan="7">
                        <span class="text text-info">Chưa tham gia lớp học nào.</span>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>


<style>
.li-classexam {
    border-bottom: 1px solid #ccc;
    list-style: none;

}

input[type="checkbox"][readonly] {
    pointer-events: none;
}

.td-task1 {
    width: 40%;
}

.td-task2 {
    width: 20%;
}

.td-task3 {
    width: 20%;
}

.td-task4 {
    width: 10%;
    text-align: center;
}

.td-task5 {
    width: 20%;
    text-align: center;
}

.spanClassName {
    font-weight: bold;
}

.form-controll {
    margin: 3px;
}

.save-parent-message-css {
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: bold;
}

.dateCSS {
    display: inline-block;
    width: 50%;
}

.timeCSS {
    display: inline-block;
    width: 30%;
    cursor: pointer !important;
}
</style>

<script>
function showClass(cTitle, cId, cPass) {
    $('#spanClassName').html(cTitle);
    $('#classInfoId').html(cId);
    $('#classInfoPass').html(cPass);

    $('#viewClass').modal({
        backdrop: 'static',
        keyboard: true,
        show: true
    });
}

function updateTitle(cid) {
    var title = $('#tdClassTitle_' + cid).html();
    $('.spanClassName').html(title);

    var teacherClassId = $('#tdTeacherClassId_' + cid).html();
    $('.teacherClassId').attr('teacherClassId', teacherClassId);
}

function rmTCEA(id, jItem) {
    return rm('https://www.789.vn/Api/RM', 'teacherclassexamapply', id, jItem);
}

function empty(input) {
    return input == '' || input == undefined || input == null;
}

function htmlEncode(str) {
    return String(str).replace(/[^\w. ]/gi, function(c) {
        return '&#' + c.charCodeAt(0) + ';';
    });
}

function show(eId) {
    $('.divParentRegionCSS').hide();
    if ($(eId).css('display') == 'none') {
        $(eId).show();
        $(eId).css('display', 'block');
    }
}

function hide(eId) {
    $('.divParentRegionCSS').hide();
    $(eId).hide();
    $(eId).css('display', 'none');
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

<div class="modal fade" id="joinClassModal" role="dialog" aria-hidden="true">
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