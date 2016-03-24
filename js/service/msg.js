function data() {
    var url = '../PHP/Service/UserService/Data.php';
    $.getJSON(url, function (data) {
        var Name = data.PersonalData.UserName;
        document.title = Name + '的消息';
        $("#head").attr('src', data.PersonalData.UserPhoto);
    });
}

function creat_food(avator, nickname, place, datetime, msg, id, deal) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12 info">'
        + '<div class="col-lg-4  col-md-4 col-sm-4">'
        + '<img class="img-thumbnail info-img"src="' + avator + '"></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4"><h2 class="text-center" id="nickname"> ' + nickname + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4"></span><h2 class="text-center" id="place"> ' + place + ' </h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4"><h2 class="text-center" id="deal"> ' + deal + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4"><h2 class="text-center" id="datetime"> ' + datetime + ' </h2></div>'
        + '<div class="col-lg-12 col-md-12 col-sm-12"><h2 class="text-center" id="msg">' + msg + '<span class="glyphicon glyphicon-cutlery"></h2></div></div>'
        + '<p class="hidden" id="foodid">' + id + '</p>';
    return msg;
}

function creat_date(nickname, avator, datetime, place, msg, id, getuser) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12 info">'
        + '<div class="col-lg-4  col-md-6 col-sm-6">'
        + '<img class="img-thumbnail info-img" ' + 'src="' + avator + '"></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="text-center">' + nickname + '</h2></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6">'
        + '<h2 class="text-center">' + datetime + '</h2>'
        + '</div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6">'
        + '<h2 class="text-center">' + place + '</h2>'
        + '</div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + msg + '<span class="glyphicon glyphicon-fire"></h3>'
        + '<p class="hidden">' + id + '</p>'
        + '</div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' +getuser+'</h3>'
        + '</div></div>';
    return msg;
}

function Show(part) {
    var url = '../PHP/Service/UserService/Check.php?table=';
    $.ajaxSetup({
        async: false
    });
    if (part == 'run') {
        $.getJSON(url + 'run', function (data, status) {
            var num = data.postnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var runid;
            var place;
            setInterval(function () {
                if (sum != num) {
                    var getuser = '接受邀请的人：';
                    userid = data.post[sum].UserId;
                    datetime = data.post[sum].RunTime;
                    place = data.post[sum].RunArea;
                    msg = data.post[sum].RunInformation;
                    runid = data.post[sum].RunId;
                    getuser = getData(data.post[sum].GetUser);
                    if (getuser == '') {
                        getuser = '还没有人接受你的邀请';
                    }
                    else{
                        url = '../php/Service/UserService/GetData.php?userid=' + getuser;
                        $.getJSON(url, function (data) {
                           getuser='接受者：'+data.NickName;
                        });
                    }
                    url = '../php/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, runid, getuser);
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
                    });
                    sum++;
                }
            }, 1);
        });
    }
    if (part == 'xue') {
        $.getJSON(url + 'xue', function (data, status) {
            var num = data.postnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var xueid;
            var place;
            var getuser;
            setInterval(function () {
                if (sum != num) {
                    userid = data.post[sum].UserId;
                    datetime = data.post[sum].XueTime;
                    place = data.post[sum].XueArea;
                    msg = data.post[sum].XueInformation;
                    xueid = data.post[sum].XueId;
                    getuser = getData(data.post[sum].GetUser);
                    if (getuser == '') {
                        getuser = '还没有人接受你的邀请';
                    }
                    else{
                        url = '../php/Service/UserService/GetData.php?userid=' + getuser;
                        $.getJSON(url, function (data) {
                            getuser='接受者：'+data.NickName;
                        });
                    }
                    url = '../php/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, xueid,getuser);
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
                    });
                    sum++;
                }
            }, 1);
        });
    }
    if (part == 'food') {
        $.getJSON(url + 'food', function (data, status) {
            var num = data.postnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var foodid;
            var deal;
            var place;
            setInterval(function () {
                if (sum != num) {
                    userid = data.post[sum].UserId;
                    datetime = data.post[sum].FoodTime;
                    place = data.post[sum].FoodArea;
                    foodid = data.post[sum].FoodId;
                    deal = data.post[sum].FoodWay;
                    msg = data.post[sum].FoodInformation;
                    url = '../php/Service/UserService/GetData.php?userid=' + data.post[sum].UserId;
                    $.getJSON(url, function (data2) {
                        msg = creat_food(data2.UserPhoto, data2.NickName, place, datetime, msg, foodid, deal);
                        $("#content")[0].innerHTML += msg;
                    });
                    sum++;
                }
            }, 1);
        });
    }
}

function Show1(part) {
    var url = '../PHP/Service/UserService/Check.php?table=';
    $.ajaxSetup({
        async: false
    });
    if (part == 'run') {
        $.getJSON(url + 'run', function (data, status) {
            var num = data.getnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var runid;
            var place;
            setInterval(function () {
                if (sum != num) {
                    userid = data.get[sum].UserId;
                    datetime = data.get[sum].RunTime;
                    place = data.get[sum].RunArea;
                    msg = data.get[sum].RunInformation;
                    runid = data.get[sum].RunId;
                    url = '../php/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, runid,'');
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
                    });
                    sum++;
                }
            }, 1);
        });
    }
    if (part == 'xue') {
        $.getJSON(url + 'xue', function (data, status) {
            var num = data.getnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var xueid;
            var place;
            var getuser;
            setInterval(function () {
                if (sum != num) {
                    userid = data.get[sum].UserId;
                    datetime = data.get[sum].XueTime;
                    place = data.get[sum].XueArea;
                    msg = data.post[sum].XueInformation;
                    xueid = data.get[sum].XueId;
                    url = '../php/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, xueid,'');
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
                    });
                    sum++;
                }
            }, 1);
        });
    }
    if (part == 'food') {
        $.getJSON(url + 'food', function (data, status) {
            var num = data.getnum;
            var sum = 0;
            var datetime;
            var msg;
            var userid;
            var foodid;
            var deal;
            var place;
            setInterval(function () {
                if (sum != num) {
                    userid = data.get[sum].UserId;
                    datetime = data.get[sum].FoodTime;
                    place = data.get[sum].FoodArea;
                    foodid = data.get[sum].FoodId;
                    deal = data.get[sum].FoodWay;
                    msg = data.get[sum].FoodInformation;
                    url = '../php/Service/UserService/GetData.php?userid=' + data.get[sum].UserId;
                    $.getJSON(url, function (data2) {
                        msg = creat_food(data2.UserPhoto, data2.NickName, place, datetime, msg, foodid, deal,'');
                        $("#content")[0].innerHTML += msg;
                    });
                    sum++;
                }
            }, 1);
        });
    }
}
$(document).ready(function () {
    data();
    $("#initiated").click(function () {
        $("#content")[0].innerHTML='';
        Show('run');
        Show('xue');
        Show('food');
    });
    $("#accepted").click(function () {
        $("#content")[0].innerHTML='';
        Show1('run');
        Show1('xue');
        Show1('food');
    });
});