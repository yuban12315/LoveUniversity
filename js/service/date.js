function creat(nickname, avator, datetime, msg, userid) {
    var data;
    data = '<div class="col-lg-6 col-md-12 col-sm-12 info">'
        + '<div class="col-lg-4  col-md-6 col-sm-6">'
        + '<img class="img-thumbnail" ' + 'src=' + avator + '></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="text-center">' + nickname + '</h2></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6">'
        + '<h2 class="text-center">' + datetime + '</h2>'
        + '</div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + msg + '</h3>'
        + ' <button class="btn btn-sm big pull-right" onclick="date(this)">约</button>'
        + '<p class="hidden">' + userid + '</p>'
        + '</div></div>';
    return data;
}

function date(obj) {
    var user = obj.nextElementSibling.innerHTML;
}

function  show(){
    var url='../../PHP/Service/RunService/Sum.php';
    $.getJSON(url, function (data, status) {
        var num=data.num;
        var sum=0;
        var nickname;
        var avator;
        var datetime;
        var msg;
        var userid;
        while(sum<num){
            nickname=data[sum].NickName;
            userid=data[sum].UserId;

        }
    })
}

function submit() {
    var url = '../../PHP/Service/RunService/Create.php';
    var msg = $("#input-content").val();
    var datetime = $("#datetime").val();
    datetime += ':00';
    $.post('http://127.0.0.1/LoveUniversity/PHP/Service/RunService/Create.php', {
        runtime: datetime,
        runinformation: msg
    }, function (data) {
        if (data[0] == '1')
            location.reload();
        else {
            $("#word").text(data);
        }
    });
}

$(document).ready(function () {
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    $("#submit").click(function () {
        submit();
    });
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
});