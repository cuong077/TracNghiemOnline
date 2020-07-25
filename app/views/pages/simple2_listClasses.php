<div id="wrapper" class="menu-wrapper">
    <!-- start header -->
    <style>
    .ban-tin-789 {
        background-color: #212121;
    }
    .same-width{
        width: 80px;
    }
    </style>

    <section id=" text-center" style="margin-bottom:20px;">
        <div class="text-center">

            <h2 class="pageTitle" style="">Danh sách lớp học</h2>
        </div>
    </section>


    <div class="row">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr class="text-center">
                    <th class="col-lg-1 text-center">STT</th>
                    <th class="col-lg-3 text-center">Tên lớp học</th>
                    <th class="col-lg-3 text-center">Mô tả</th>
                    <th class="col-lg-2 text-center">Khối lớp</th>
                    <th class="col-lg-1 text-center">Password</th>
                    <th class="col-lg-1 text-center">Sỉ số</th>
                    <th class="col-lg-2 text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    @$classes = $data["classes"];
                    // @$grades = $data["grades"];
                    @$grades = $data["grades"];
                    $index = 0;
                    // $index = 0;

                    foreach($classes as $row) {
                        $index += 1;
                ?>
                <tr id="Class_<?php echo $row["ClassId"];?>">
                    <td class="text-center"><?php echo $index;?></td>
                    <td class="text-center">
                        <?php echo $row["Name"];?>
                    </td>
                    <td class="text-center"><?php echo $row["Description"];?></td>
                    <td class="text-center">
                        <?php 
                        foreach ($grades as $grade) {
                            if($grade["GradeId"]==$row["GradeId"]){
                                echo $grade["Name"];
                            }
                        }
                    ?>
                    </td>
                    <td class="text-center"><?php echo $row["Password"]; ?></td>
                    <td class="text-center"><?php echo $row["total"]; ?></td>
                    <td class="text-center">
                        <a class="btn btn-success btn-sm same-width" style="margin-bottom: 15px;" href="Teacher/EditClass/<?php echo $row["ClassId"];?>">
                            <span class="glyphicon glyphicon-edit"></span> Sửa
                        </a>
                        <a class="btn btn-success btn-sm same-width" style="margin-bottom: 15px;" href="Teacher/ListResourceClass/<?php echo $row["ClassId"];?>">
                            <span class="glyphicon glyphicon-th-list"></span> Xem
                        </a>
                        <a class="btn btn-success btn-sm same-width"  href="Teacher/AddExamExecire/<?php echo $row["ClassId"];?>">
                            <span class="glyphicon glyphicon-plus"></span> Thêm
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<style>
.li-classexam {
    border-bottom: 1px solid #ccc;
    list-style: none;
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

function getClassExam(url, cid, jId) {
    updateTitle(cid);
    url = 'https://www.789.vn/Api/GetExamOfClass';
    if (empty(cid) || cid <= 0) {
        return;
    }
    var params = {
        cid: cid
    };
    $('#tblExam>tbody').html('');
    $.post(url, params, function(datas) {

        var jItems = datas.data;
        var html = '';
        for (i = 0; i < jItems.length; i++) {
            var jItem = jItems[i];
            html += '<tr id="tr_' + jItem.Id +
                '"><td class="td-task1"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=' +
                jItem.Id + '" title="Nhấn vào đây để xem kết quả của học sinh">' + jItem.Title +
                '</a></td><td class="td-task2">' + jItem.From + '</td><td class="td-task3">' + jItem.To +
                '</td><td class="td-task3"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=' +
                jItem.Id +
                '" title="Nhấn vào đây để xem kết quả của học sinh">Xem điểm</a></td><td class="td-task4"><a href="javascript:rmTCEA(\'' +
                jItem.Id + '\',\'#tr_' + jItem.Id +
                '\')" title="Xóa"><i class="glyphicon glyphicon-remove"></i></a></td></tr>';
        }

        $('#tblExam>tbody').append(html);
        //$(jId).html(html);
        //showAlert({ 'content': $('#listExam').html(), 'w': 500, 'h': 380 });
        $('#listExam').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });
    });
}

function getClassExamMain(url, cid, jId) {
    updateTitle(cid);
    url = 'https://www.789.vn/Api/GetExamOfClass';
    if (empty(cid) || cid <= 0) {
        return;
    }
    var params = {
        cid: cid
    };
    $('#tblExam>tbody').html('');
    $.post(url, params, function(datas) {

        var jItems = datas.data;
        var html = '';
        for (i = 0; i < jItems.length; i++) {
            var jItem = jItems[i];
            //html += '<tr id="tr_' + jItem.Id + '"><td class="td-task1"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=' + jItem.Id + '" title="Nhấn vào đây để xem kết quả của học sinh">' + jItem.Title + '</a></td><td class="td-task2">' + jItem.From + '</td><td class="td-task3">' + jItem.To + '</td><td class="td-task3"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=' + jItem.Id + '" title="Nhấn vào đây để xem kết quả của học sinh">Xem điểm</a></td><td class="td-task4"><a href="javascript:rmTCEA(\'' + jItem.Id + '\',\'#tr_' + jItem.Id + '\')" title="Xóa"><i class="glyphicon glyphicon-remove"></i></a></td></tr>';
            html += `<tr id="tr_` + jItem.Id +
                `">
                                <td class="td-task2"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=` +
                jItem.Id +
                `" title="Nhấn vào đây để xem kết quả của học sinh">` + jItem.Title + `</a></td>
                                <td class="td-task2">` + jItem.From + `</td>
                                <td class="td-task2">` + jItem.To +
                `</td>
                                <td class="td-task4"><a target="_blank" href="https://www.789.vn/ket-qua-kiem-tra.html?id=` +
                jItem.Id +
                `" title="Nhấn vào đây để xem kết quả của học sinh">Xem điểm</a></td>
                                <td class="td-task4"><a title="Nhấn vào đây để xem thống kê" onclick="OpenPopup('Thống Kê Số Học Sinh Trả Lời Câu Hỏi Đúng, Sai Theo Mã Đề','/Home/ReportEduExamSLRightWrong?ExamId=` +
                jItem.Id + `',850)" href="javascript:void(0)"> Thống kê</a></td>
                                <td class="td-task4"><a href="javascript:rmTCEA(\'` + jItem.Id + `\',\'#tr_` + jItem
                .Id + `\')" title="Xóa"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>`;

        }

        $('#tblExamView>tbody').html(html);
        $('#listExams').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });
    });
}

function rmTCEA(id, jItem) {
    //\'http://localhost:26880/Api/RM\','teacherclass','4','#tr_4'
    return rm('https://www.789.vn/Api/RM', 'teacherclassexamapply', id, jItem);
}

function addExam(url, cid, jId) {
    url = 'https://www.789.vn/Api/AddExamToClass';
    var title = $('#title').val();
    var examId = $('#exam').val();
    var from = $('#fromDate').val();
    var to = $('#toDate').val();

    var fromTime = $('#fromTime').val();
    var toTime = $('#toTime').val();
    var chkShow = 0;
    if ($('#chkShow').prop('checked')) {
        chkShow = 1;
    }

    var showDate = $('#showDate').val();
    var showTime = $('#showTime').val();

    if (empty(cid) || cid <= 0 || empty(title) || empty(examId) || examId <= 0 || empty(from) || empty(to)) {
        //$('.errorCSS').html('Vui lòng nhập đầy đủ thông tin yêu cầu!');
        //showAlert({ 'content':'Vui lòng nhập đầy đủ thông tin yêu cầu!', 'w': 500, 'h': 400 });
        alert('Vui lòng nhập đầy đủ thông tin yêu cầu!');
        return;
    }

    var params = {
        title: title,
        cid: cid,
        examId: $('#exam').val(),
        from: from,
        to: to,
        fromTime: fromTime,
        toTime: toTime,
        chkShow: chkShow,
        showDate: showDate,
        showTime: showTime
    };
    $.post(url, params, function(datas) {

        var jItems = datas.data;
        var html = '';
        for (i = 0; i < jItems.length; i++) {
            var jItem = jItems[i];
            html += '<tr id="tr_' + jItem.Id + '"><td>' + jItem.Title + '</td><td>' + jItem.From +
                '</td><td>' + jItem.To + '</td><td>&nbsp;</td><td><a href="javascript:rmTCEA(\'' + jItem
                .Id + '\',\'#tr_' + jItem.Id +
                '\')" title="Xóa"><i class="glyphicon glyphicon-remove"></i></a></td></tr>';
        }

        $('#tblExam>tbody').prepend(html);
        //$(jId).html(html);
        //showAlert({ 'content': $('#listExam').html(), 'w': 500, 'h': 400 });
    });
}

function empty(input) {
    return input == '' || input == undefined || input == null;
}

function htmlEncode(str) {
    return String(str).replace(/[^\w. ]/gi, function(c) {
        return '&#' + c.charCodeAt(0) + ';';
    });
}

function getUserClass(url, cid, jId) {
    updateTitle(cid);
    url = 'https://www.789.vn/Api/GetUserOfClass';
    if (empty(cid) || cid <= 0) {
        return;
    }
    var params = {
        id: cid
    };
    $('#tblUsers>tbody').html('');
    $.post(url, params, function(datas) {

        var jItems = datas.data;
        jItems.sort(function(a, b) {
            return a.Fullname.localeCompare(b.Fullname);
        });

        jItems.sort();
        var html = '';
        $('#sTotal').html(jItems.length);
        for (i = 0; i < jItems.length; i++) {
            var jItem = jItems[i];
            var fn = jItem.Fullname.replace(/script/g, "").replace(/document/g, "");
            var fullName = htmlEncode(fn);
            html += '<tr id="tr_userclass_' + jItem.Id + '"><td class="">' + (i + 1) +
                '</td><td class="">' + fullName + '</td><td class="">' + jItem.Phone +
                '</td><td class="">' + jItem.JoinDate + '</td><td class="text-center" id="tdStatus_' + jItem
                .Id + '">';

            if (jItem.JoinStatus == 0) {
                html += '<a href="javascript:approveUserToClass(\'' + jItem.ClassId + '\',\'' + jItem.Id +
                    '\',1,\'#tdStatus_' + jItem.Id + '\')" title="Đồng ý">Đồng ý</a> | ';
                html += '<a href="javascript:approveUserToClass(\'' + jItem.ClassId + '\',\'' + jItem.Id +
                    '\',0,\'#tr_userclass_' + jItem.Id + '\')" title="Từ chối">Từ chối</a>';
            } else {
                html += '<i class="glyphicon glyphicon-check"></i> Đã duyệt | ';
                html += '<a href="javascript:approveUserToClass(\'' + jItem.ClassId + '\',\'' + jItem.Id +
                    '\',2,\'#tr_userclass_' + jItem.Id + '\')" title="Xóa">Xóa</a>';
            }

            html += '</td>';
            html +=
                '<td class="text-center"><button class="btn btn-primary" onclick="show(\'#divParentRegion' +
                jItem.Id + '\');"><i class="glyphicon glyphicon-plus"></i> Thêm</button>';
            html += '<div class="divParentRegionCSS" id="divParentRegion' + jItem.Id +
                '" style="border: 1px solid #ccc;padding: 10px;position: relative;right: 10px;background-color: azure;display:none">';
            html += '<div style="text-align:center">';
            html += '<span class="save-parent-message-css" id="spanSaveParent' + jItem.Id + '">Thêm</span>';
            html += '</div>';
            var pfullName = htmlEncode(jItem.PFullname);
            html += '<input id="parentFullname' + jItem.Id +
                '" type="text" class="form-controll" placeholder="Họ tên" value="' + pfullName + '">';
            html += '<input id="parentPhone' + jItem.Id +
                '" type="text" class="form-controll" placeholder="Điện thoại" value="' + jItem.PPhone +
                '">';
            html += '<input id="parentEmail' + jItem.Id +
                '" type="text" class="form-controll" placeholder="Email" value="' + jItem.PEmail + '">';
            html += '<div style="text-align:center">';
            html += '<input id="btnSaveParent' + jItem.Id +
                '" type="button" class="btn btn-primary" value="Lưu" onclick="saveParent(' + jItem.ClassId +
                ',' + jItem.Id + ',\'#spanSaveParent' + jItem.Id + '\')">';
            html += '&nbsp;&nbsp;&nbsp;<input id="btnSaveParent' + jItem.Id +
                '" type="button" class="btn btn-default" value="Đóng" onclick="hide(\'#divParentRegion' +
                jItem.Id + '\');">';
            html += '</div>';

            html += '</div>';
            html += '</td></tr>';
        }

        $('#tblUsers>tbody').append(html);
        $('#listUsers').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });
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

function approveUserToClass(cid, id, action, jId) {
    url = 'https://www.789.vn/Api/ApproveUserToClass';
    if (empty(cid) || cid <= 0) {
        return;
    }
    var params = {
        id: id,
        cid: cid,
        action: action
    };
    $.post(url, params, function(datas) {
        var jItem = datas;
        if (action == 1) {
            if (jItem.RC == 1) {
                $(jId).html('<i class="glyphicon glyphicon-check"></i>');
            } else {
                alert(jItem.RD);
            }
        } else {
            if (jItem.RC == 1) {
                $(jId).remove();
            } else {
                alert(jItem.RD);
            }
        }
    });
}

function saveParent(cid, id, jId) {
    url = 'https://www.789.vn/Api/AddParentOfStudentToClass';
    if (empty(cid) || cid <= 0 || empty(id) || id <= 0) {
        alert('Quý Thầy/Cô vui lòng điền đầy đủ thông tin yêu cầu');
        return;
    }
    var fullname = $('#parentFullname' + id).val();
    var phone = $('#parentPhone' + id).val();
    var email = $('#parentEmail' + id).val();

    if (empty(fullname) || empty(phone) || empty(email)) {
        alert('Quý Thầy/Cô vui lòng điền đầy đủ thông tin yêu cầu');
        return;
    }

    if (!validateEmail(email)) {
        alert('Địa chỉ Email không hợp lệ, vui lòng kiểm tra lại');
        return;
    }
    if (phone.length < 9) {
        alert('Số điện thoại không hợp lệ, vui lòng kiểm tra lại');
        return;
    }

    var params = {
        id: id,
        cid: cid,
        fullname: fullname,
        phone: phone,
        email: email
    };
    $.post(url, params, function(datas) {
        var jItem = datas;
        if (jItem.RC == 1) {
            $(jId).html('Lưu thành công');
        } else {
            $(jId).html('Lưu không thành công, vui lòng thực hiện lại');
            alert(jItem.RD);
        }
    });
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

    // $("tr")

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