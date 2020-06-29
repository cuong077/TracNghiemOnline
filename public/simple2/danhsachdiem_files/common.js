function checkAllItems(cssName, checked, batchItems) {
    //alert(checked);
    //$('.' + cssName).prop('checked', true);
    $('.' + cssName).each(function () {
        document.getElementById($(this).attr('id')).checked = checked;
    });
    setItemSelected(cssName, batchItems);
}
function anItemChecked(cssName, parentId, batchItems) {
    document.getElementById(parentId).checked = false;
    $('.' + cssName).each(function () {
        var chk = document.getElementById($(this).attr('id')).checked;
        if (chk) {
            document.getElementById(parentId).checked = true;
        }
    });
    setItemSelected(cssName, batchItems);
}
function setItemSelected(itemCSS, batchItems)
{
    var bItem = $('#' + batchItems);
    bItem.val('');
    $('.' + itemCSS).each(function () {
        var chk = document.getElementById($(this).attr('id')).checked;
        if (chk) {
            if (bItem.val() != '') {
                bItem.val(bItem.val() + ',' + $(this).val());
            } else {
                bItem.val($(this).val());
            }
        }
    });
}
function removeSign(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
    /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1- 
    str = str.replace(/^\-+|\-+$/g, "");
    //cắt bỏ ký tự - ở đầu và cuối chuỗi  
    return str;
}
function createAlias(str) {
    var noSign = removeSign(str);
    var alias = noSign.replace(/ /g, '-');
    alias = alias.toLowerCase();
    return alias;
}

function updatePublished(url, tableName, collumnName, keyFieldName, itemId) {
    var value = $('#published_' + itemId).val();
    if (value == '1') {
        value = 0;
    } else {
        value = 1;
    }
    $('#published_' + itemId).val(value);
    var params = {
        tableName: tableName,
        keyFieldName:keyFieldName,
        collumnName: collumnName,
        itemId: itemId,
        itemValue: value
    };
    showBox();
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        dataType: 'json',
        success: function (json) {
            if (json.code == 1) {
                $('#i_published_' + itemId).attr('src', json.html);
            } else {
                //alert(json.message);
            }
            hideBox();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            //showBox(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText, 3000);
            hideBox();
        }
    });
}
function updateOrdrering(url, tableName, collumnName, keyFieldName, itemId) {
    var value = $('#ordering_' + itemId).val();
    value = parseInt(value);
    var params = {
        tableName: tableName,
        keyFieldName: keyFieldName,
        collumnName: collumnName,
        itemId: itemId,
        itemValue: value
    };
    showBox();
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        dataType: 'json',
        success: function (json) {
            hideBox();
            if (json.code == 1) {
                //alert(json.message);
            } else {
                //alert(json.message);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            hideBox();
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
function toS(o)
{
    var output = '';
    for (var property in o) {
        output += property + ': ' + o[property]+'; ';
    }
    alert(output);
}
function saveLanguage(ownerId, url, tableName, collumnNames, keyFieldName, itemId, lc) {
    for (var instanceName in CKEDITOR.instances) {//update richtext
        CKEDITOR.instances[instanceName].updateElement();
    }
    var cols = collumnNames.split(',');
    
    var params = {
        tableName: tableName,
        keyFieldName: keyFieldName,
        itemId: itemId,
        lc: lc,
        collumnNames: collumnNames
    };
    for (var i = 0; i < cols.length; i++) {
        var value = $('#' + lc + '_' + cols[i]).val();
        params[cols[i]] = value;
    }
    showBox();
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        dataType: 'json',
        success: function (json) {
            hideBox();
            showNotifyResultToUser(ownerId, json.message);
            if (json.code == 1) {
                //alert(json.message);
                //showBox(json.message,5000);
            } else {
                //alert(json.message);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            hideBox();
            showNotifyResultToUser(ownerId, json.message);
        }
    });
}
function update(url, tableName, keyFieldName, json) {
    var value = $('#ordering_' + itemId).val();
    value = parseInt(value);
    var params = {
        tableName: tableName,
        keyFieldName: keyFieldName,
        collumnName: collumnName,
        itemId: itemId,
        itemValue: value
    };
    showBox();
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        dataType: 'json',
        success: function (json) {
            hideBox();
            if (json.code == 1) {
                //alert(json.message);
            } else {
                //alert(json.message);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            hideBox();
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
function showBox(content)
{
    hideBox();
    $('#processingBox .modal-content').html(content);
    $('#processingBox').modal('show');
}
function hideBox() {
    $('#processingBox').modal('hide');
}
var notifyHandler;
function showNotifyResultToUser(id, message)
{
    //data-toggle="tooltip" data-placement="left" title="Tooltip on left"
    $('#' + id).attr('data-toggle', 'tooltip');
    $('#' + id).attr('data-placement', 'top');
    $('#' + id).attr('title', message);
    $('#' + id).tooltip('show');
    var interval = 3000;
    if (interval > 0) {
        notifyHandler = setTimeout(function () { hideNotifyResultToUser(id);}, interval);
    }
}
function hideNotifyResultToUser(id)
{
    console.debug(id);
    $('#' + id).removeAttr('data-placement');
    $('#' + id).removeAttr('data-toggle');
    $('#' + id).removeAttr('title');
    $('#' + id).removeAttr('data-original-title');
    $('#' + id).tooltip('hide');
    $('#' + id).tooltip('destroy');
    clearTimeout(notifyHandler);
}

function OpenPopup(title, url, width, callback) {
    if (typeof width === "undefined" || width === null) {
        width = 600;
    }
    $("#tinyPopupLabel").html(title);
    $("#tinyPopup .modal-dialog").css("width", width + "px");
    loading.Show();
    $.get(url, function (data) {
        $("#tinyPopupBody").html(data);
        loading.Hide();
        $("#tinyPopup").modal({ show: true, backdrop: false });
        if (typeof callback == "function")
            callback();

    }).fail(function (xhr, status, error) {
        loading.Hide();
        //window.alertify.error("<strong>" + xhr.status + ":" + xhr.statusText + "!</strong><br/> " + url + '');
    });
}
function ClosePopup() {
    $("#tinyPopup").modal("hide");

}

var loading = { 
    Show: function (notify) {     
        if (notify != null) {
            $("#ajax-loading label").html(notify + " - Nhấp double chuột để đóng.");
        }
        else
            $("#ajax-loading label").html("Nhấp double chuột để đóng.");
        $("#ajax-loading").removeClass("hidden");
    },
    Hide: function () {
        $("#ajax-loading").addClass("hidden");
    }
};

$(document).ready(function () {
    $("#ajax-loading").dblclick(function () {
        $("#ajax-loading").addClass("hidden");
    });
});