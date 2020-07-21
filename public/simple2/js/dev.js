function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}
function registerEmail(url, jEmail, jFullname) {

    var email = $(jEmail).val();
    var fullname = $(jFullname).val();
    if ($.trim(email) == '') {
        showAlert({ content: 'Bạn chưa nhập email' });
        return;
    }
    if (!validateEmail(email)) {
        showAlert({ content: 'Email không hợp lệ, vui lòng kiểm tra lại' });
        return;
    }
    if ($.trim(fullname) == '') {
        showAlert({ content: 'Bạn chưa nhập họ tên' });
        return;
    }
    var params = {
        email: email,
        fullname: fullname
    };
    $.post(url, params, function (data) {
        var jItem = data;
        showAlert({ content: jItem.RD });
    }, 'json');
}
function menuIconClick(jMenuIcon, jMenu) {
    if ($(jMenu).hasClass('in')) {
        $(jMenu).removeClass('in');
        $(jMenu).hide('slow');
    } else {
        $(jMenu).addClass('in');
        $(jMenu).show('face');
    }
}
function rm(url, action, id, jTR) {

    if ($.trim(action) == '' || $.trim(id) == '') {
        showAlert({ content: 'Dữ liệu không hợp lệ' });
        return;
    }
    
    var params = {
        action: action,
        id: id
    };
    $.post(url, params, function (data) {
        var jItem = data;
        if (jItem.RC == 1)
        {
            $(jTR).remove();
        }
        showAlert({ content: jItem.RD });
    }, 'json');
}
function iconClick(jThisId, jShowItemId, jInputId, callBack, showIconCSS, hideIconCSS) {
    if (showIconCSS == undefined || showIconCSS == null || showIconCSS == '') {
        showIconCSS = 'glyphicon-plus';
    }
    if (hideIconCSS == undefined || hideIconCSS == null || hideIconCSS == '') {
        hideIconCSS = 'glyphicon-minus';
    }
    if ($(jThisId).hasClass(showIconCSS)) {
        //glyphicon-minus-sign
        $(jThisId).removeClass(showIconCSS);
        $(jThisId).addClass(hideIconCSS);
        $(jShowItemId).show();
        $(jInputId).show();
    } else {
        $(jThisId).removeClass(hideIconCSS);
        $(jThisId).addClass(showIconCSS);
        $(jShowItemId).hide();
        $(jInputId).hide();
    }
    if (typeof callBack === 'function') {
        callBack();
    }
}
function isEmpty(inputValue)
{
    return inputValue == undefined || inputValue == null || inputValue == '';
}

/*alert*/
var ALERT_TITLE = "Thông báo!";
var ALERT_BUTTON_TEXT = "Đóng";

if (document.getElementById) {
    window.alert = function (txt) {
        createCustomAlert(txt);
    }
}

function createCustomAlert(txt) {
    d = document;

    if (d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if (d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth) / 2 + "px";
    alertObj.style.visiblity = "visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function () { removeCustomAlert(); return false; }

    alertObj.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
function ful() {
    alert('Alert this pages');
}
/*end alert*/
/*cookie start*/
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}


function setCookie(name, value, expires, path, domain) {
    // set time, it's in milliseconds
    var today = new Date();
    today.setTime(today.getTime());

    /*
    if the expires variable is set, make the correct 
    expires time, the current script below will set 
    it for x number of days, to make it for hours, 
    delete * 24, for minutes, delete * 60 * 24
    */
    if (expires) {
        expires = expires * 1000 * 60 * 60 * 24;
    }
    var expires_date = new Date(today.getTime() + (expires));
    document.cookie = name + "=" + escape(value) +
    ((expires) ? ";expires=" + expires_date.toGMTString() : "") +
    ((path) ? ";path=" + escape(path) : "") +
    ((domain) ? ";domain=" + domain : "");
}
/*cookie end*/
//check data loss network
function checkExam(url, userId)
{
    return;
    if (userId == 0 || userId == '' || userId == undefined) return;
    var cookie = getCookie(userId + 'hf'); //alert(cookie);
    if(cookie != null && cookie != '' && cookie != undefined)
    {
        var p = cookie.split('|');
        var uid = p[0];
        var hid = p[1];
        var t = p[2];
        var a = p[3];

        if (userId == 0  || userId == '' || userId == undefined || uid <= 0 || hid <= 0 || a == '') return;
        //CheckHistory
        var url = url + '/Api/CheckHistory';
        var params = {
            uid:uid,
            hid: hid,
            t: t,
            a: a
        };
        $.post(url, params, function (datas) {
            var jItem = datas;
            if (jItem.RC == 1) {
                setCookie(userId + 'hf', "", -1);
                if(jItem.RD != '')
                {
                    window.location.href = jItem.RD;
                    return;
                }
            } else {
                //console.log(jItem.RM + 'fail,' + hid + ',' + t + ',' + a)
            }
        });
    }
}