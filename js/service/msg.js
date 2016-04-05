function data() {
    var url = '../PHP/Service/UserService/Data.php';
    $.getJSON(url, function (data) {
        var Name = data.PersonalData.UserName;
        document.title = Name + '的消息';
        $("#head").attr('src', data.PersonalData.UserPhoto);
    });
}
function creat_trade(image, title, time, id) {
    var data = '<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 long" onclick="detail(this)">'
        + '<div class="col-lg-3  col-md-3 col-sm-3  col-xs-3">'
        + '<img class="img-thumbnail info-img" src="' + image + '"> </div>'
        + '<div class="col-lg-6  col-md-6 col-sm-6 col-xs-6"><h2  > ' + title + '</h2></div>'
        + '<div class="col-lg-3  col-md-3 col-sm-3 col-xs-3"><h3  >下架时间： ' + time + '</h3></div></div>'
        + '<p class="hidden">' + id + '</p>';
    return data;
}

function creat_food(avator, nickname, place, datetime, msg, id, deal,part) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 info">'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4">'
        + '<img class="img-thumbnail info-img"src="' + avator + '"></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"><h2 class="text-center" id="nickname"> ' + nickname + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"></span><h2 class="text-center" id="place"> ' + place + ' </h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4  col-xs-4"><h2 class="text-center" id="deal"> ' + deal + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"><h2 class="text-center" id="datetime"> ' + datetime + ' </h2></div>'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h2 class="text-center" id="msg">' + msg + '<span class="glyphicon glyphicon-cutlery"></h2></div>'
        + '<button class="btn btn-info pull-right big" onclick="del(this)"><span class="glyphicon glyphicon-triangle-top"></span>撤回</button>'
        + '<p class="hidden" >' + id + '</p>'
        + '<p class="hidden" >' + part + '</p></div>';
    return msg;
}

function creat_date(nickname, avator, datetime, place, msg, id, getuser,part) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 info">'
        + '<div class="col-lg-4  col-md-6 col-sm-6 col-xs-12">'
        + '<img class="img-thumbnail info-img" ' + 'src="' + avator + '"></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><h2 class="text-center">' + nickname + '</h2></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">'
        + '<h2 class="text-center">' + datetime + '</h2></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">'
        + '<h2 class="text-center">' + place + '</h2></div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + msg + '<span class="glyphicon glyphicon-fire"></h3>'
        + '<button class="btn btn-info pull-right big" onclick="del(this)"><span class="glyphicon glyphicon-triangle-top"></span>撤回</button>'
        + '<p class="hidden">' + id + '</p>'
        + '<p class="hidden">' + part + '</p></div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + getuser + '</h3></div></div>';
    return msg;
}

function creat_food1(avator, nickname, place, datetime, msg, id, deal) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 info">'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4">'
        + '<img class="img-thumbnail info-img"src="' + avator + '"></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"><h2 class="text-center" id="nickname"> ' + nickname + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"></span><h2 class="text-center" id="place"> ' + place + ' </h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"><h2 class="text-center" id="deal"> ' + deal + '</h2></div>'
        + '<div class="col-lg-4  col-md-4 col-sm-4 col-xs-4"><h2 class="text-center" id="datetime"> ' + datetime + ' </h2></div>'
        + '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h2 class="text-center" id="msg">' + msg + '<span class="glyphicon glyphicon-cutlery"></h2></div></div>'
        + '<p class="hidden" id="foodid">' + id + '</p>';
    return msg;
}

function creat_date1(nickname, avator, datetime, place, msg, id, getuser) {
    var msg = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 info">'
        + '<div class="col-lg-4  col-md-6 col-sm-6 col-xs-6">'
        + '<img class="img-thumbnail info-img" ' + 'src="' + avator + '"></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6"><h2 class="text-center">' + nickname + '</h2></div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">'
        + '<h2 class="text-center">' + datetime + '</h2>'
        + '</div>'
        + '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">'
        + '<h2 class="text-center">' + place + '</h2>'
        + '</div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + msg + '<span class="glyphicon glyphicon-fire"></h3>'
        + '<p class="hidden">' + id + '</p>'
        + '</div>'
        + '<div class="col-lg-12">'
        + '<h3 class="text-center">' + getuser + '</h3>'
        + '</div></div>';
    return msg;
}
//<button class="btn btn-info pull-right big" onclick="del(this)"><span class="glyphicon glyphicon-triangle-top"></span>悔约</button>
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
                    else {
                        url = '../PHP/Service/UserService/GetData.php?userid=' + getuser;
                        $.getJSON(url, function (data) {
                            getuser = '接受者：' + data.NickName;
                        });
                    }
                    url = '../PHP/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, runid, getuser,'run');
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
                    else {
                        url = '../PHP/Service/UserService/GetData.php?userid=' + getuser;
                        $.getJSON(url, function (data) {
                            getuser = '接受者：' + data.NickName;
                        });
                    }
                    url = '../PHP/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date(data2.NickName, data2.UserPhoto, datetime, place, msg, xueid, getuser,'xue');
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
                    url = '../PHP/Service/UserService/GetData.php?userid=' + data.post[sum].UserId;
                    $.getJSON(url, function (data2) {
                        msg = creat_food(data2.UserPhoto, data2.NickName, place, datetime, msg, foodid, deal,'food');
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
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
                    url = '../PHP/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date1(data2.NickName, data2.UserPhoto, datetime, place, msg, runid, '');
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
                    url = '../PHP/Service/UserService/GetData.php?userid=' + userid;
                    $.getJSON(url, function (data2) {
                        msg = creat_date1(data2.NickName, data2.UserPhoto, datetime, place, msg, xueid, '');
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
                    url = '../PHP/Service/UserService/GetData.php?userid=' + data.get[sum].UserId;
                    $.getJSON(url, function (data2) {
                        msg = creat_food1(data2.UserPhoto, data2.NickName, place, datetime, msg, foodid, deal, '');
                        $("#content")[0].innerHTML = msg + $("#content")[0].innerHTML;
                    });
                    sum++;
                }
            }, 1);
        });
    }
}

function del(obj) {
    var id = obj.nextElementSibling.innerHTML;
    var part=obj.nextElementSibling.nextElementSibling.innerHTML;
    alert(part);
}

$(document).ready(function () {
    data();
    $("#myup").fadeToggle('1');
    $("#myre").fadeToggle('1');
    setTimeout(function () {
        $("#loading").fadeOut();
    },300);
    $("#initiated").click(function () {
        $("#content")[0].innerHTML = '';
        $("#myup").slideDown();
        $("#myre").slideUp();
        Show('run');
        Show('xue');
        Show('food');
    });
    $("#accepted").click(function () {
        $("#content")[0].innerHTML = '';
        $("#myup").slideUp();
        $("#myre").slideDown();
        Show1('run');
        Show1('xue');
        Show1('food');
    });
});