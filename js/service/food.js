function creat(avator, nickname, place, datetime, id, deal) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12 info-long" onclick="more(this)">'
        + '<div class="col-lg-2  col-md-2 col-sm-2">'
        + '<img class="img-thumbnail info-longimg"'
        + 'src="' + avator + '"> </div>'
        + '<div class="col-lg-2  col-md-2 col-sm-2"><h2 class="text-center">' + nickname + ' </h2></div>'
        + '<div >'
        + '<div class="col-lg-3  col-md-3 col-sm-3"><h2 class="text-center" >' + place + '</h2></div>'
        + '<div class="col-lg-3  col-md-3 col-sm-3"><h2 class="text-center"> ' + datetime + ' </h2></div>'
        + '<div class="col-lg-2  col-md-2 col-sm-2"><h2 class="text-center" > ' + deal + ' </h2></div> </div>'
        + '</div>'
        + '<p class="hidden foodid">' + id + '</p>';
    return msg;
}

function submit() {
    var url = '../../PHP/Service/FoodService/Create.php'
    var place = $("#dateplace").val();
    var deal = getData($('input[name="deal"]:checked').val());
    var msg = $("#input-content").val();
    var datetime = $("#datetime").val() + ':00';
    var reg = new RegExp("\n", "g");
    msg = msg.replace(reg, '；');
    $.post(url, {
        foodarea: place,
        foodway: deal,
        foodinformation: msg,
        foodtime: datetime
    }, function (data) {
        if (data[0] == '1') {
            location.reload();
        }
        else $("#word").text(data);
    })
}

function more(obj) {
    var ms = obj.nextElementSibling.innerHTML;
    setCookie('foodpage',ms);
    location.href='foodpage.html';
}

function page(page) {
    var url = '../../PHP/Service/FoodService/Page.php?page=' + page;
    $.ajaxSetup({
        async: false
    });
    $.getJSON(url, function (data, status) {
        var num = data.Num;
        var sum = 0;
        var datetime;
        var userid;
        var foodid;
        var place;
        var deal;
        // $("#content")[0].innerHTML = '';
        setInterval(function () {
            if (sum != num) {
                userid = data[sum].UserId;
                datetime = data[sum].FoodTime;
                place = data[sum].FoodArea;
                foodid = data[sum].FoodId;
                deal = data[sum].FoodWay;
                url = '../../php/Service/UserService/GetData.php?userid=' + data[sum].UserId;
                $.getJSON(url, function (data2) {
                    msg = creat(data2.UserPhoto, data2.NickName, place, datetime, foodid, deal);
                    $("#content")[0].innerHTML += msg;
                });
                sum++;
            }
        }, 1);
    });
}

function show() {
    $.get('../../PHP/Service/FoodService/Total.php', function (data) {
        page(1);
        if (data[0] != '1') {
            $("#more").removeClass('hidden');
            num = data;
        }
        else {
            $("#more").addClass('hidden');
        }
    })
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
    show();
});