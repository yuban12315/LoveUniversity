/**
 * Created by miku on 2016/3/27.
 */
$(document).ready(function () {
    setCookie('status', '0');
    photo();
    $(function () {
        $("#input-content").keyup(function () {
            var len = $(this).val().length;
            if (len > 200) {
                $(this).val($(this).val().substring(0, 199));
                $("#word").text(0);
            }
            else {
                var num = 200 - len;
                $("#word").text(num);
            }
        });
    });
    $("#submit").click(function () {
        doUpload();
    });
});
function photo() {
    $("#file0").change(function () {
        setCookie('status', '1');
        var objUrl = getObjectURL(this.files[0]);
        console.log("objUrl = " + objUrl);
        if (objUrl) {
            $("#img0").attr("src", objUrl);
        }
        // $("#file0").slideUp('fast');
        //$("#img0").slideDown('fast');
    });
    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null;
        if (window.createObjectURL != undefined) { // basic
            url = window.createObjectURL(file);
        } else if (window.URL != undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file);
        }
        return url;
    }
}
function submit() {
    $.post('../../PHP/Service/GiveService/Create.php', {
        giveinformation: $("#input-content").val()
    }, function (data) {
        $("#word").text(data);
    })
}
function doUpload() {
    //url
    var status = getCookie('status');
    if (status == '1') {
        var formData = new FormData($("#form1")[0]);
        $.ajax({
            url: '../../PHP/Service/GiveService/Up.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == '请完善个人信息')
                    $("#word").text(data);
                else {
                    submit();
                }
            },
            error: function (returndata) {
                alert(returndata);
            }
        });
    }
}