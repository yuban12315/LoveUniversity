function comment(avatar, nickname, msg, userid) {
    var data = '<div class="comment">'
        + '<div class="col-lg-2">'
        + '<img src="' + avatar + '"> </div>'
        + '<div class="col-lg-2">'
        + '<p class="big"> ' + nickname + '</div>'
        + '<div class="col-lg-8">'
        + '<p class="big" >' + msg + '</p>'
        + '</div> </div>'
        + '<p class="hidden">' + userid + '</p>';
    return data;
}

function details(page) {
    var url = '../../PHP/Service/GiveService/GetComment.php';
    var id = getCookie('master');
    $.getJSON(url, {
        page: page,
        giveid: id
    }, function (data) {
        var num = data.Num;
        var sum = 0;
        var userid;
        var nickname;
        var avatar;
        var msg;
        $("#comment")[0].innerHTML = '';
        setInterval(function () {
            if (sum != num) {
                msg = data[sum].GetInformation;
                userid = data[sum].UserId;
                url = '../../php/Service/UserService/GetData.php?userid=' + data[sum].UserId;
                $.getJSON(url, function (data2) {
                    avatar = data2.UserPhoto;
                    msg = comment(avatar, data2.NickName, msg, id);
                    $("#comment")[0].innerHTML += msg;
                });
                sum++;
            }
        }, 1);
    });
    $("#loading").fadeOut();
}

function submit() {
    var url = '../../PHP/Service/GiveService/Get.php';
    var id = getCookie('master');
    $.post(url, {
        giveid: id,
        getinformation: $("#input-content").val()
    }, function (data) {
        if(data[0]!='1'){
            $("#word").text(data);
        }
        else{
            location.reload();
        }
    })
}

$(document).ready(function () {
    $.ajaxSetup({
        async: false
    });
    $("#submit").click(function () {
        submit();
    });
    $.getJSON('../../PHP/Service/GiveService/Details.php',{
        giveid:getCookie('master')
    }, function (data) {
        $("#msg")[0].innerHTML=data.GiveInformation;
        $("#img").attr('src',data.GiveImage);
        var url='../../php/Service/UserService/GetData.php?userid='+data.UserId;
        $.getJSON(url, function (data) {
            $("#nickname")[0].innerHTML=data.NickName;
        })
    })
    details(1);
});