function Loaded() {
    if (getCookie('userid')) {
        resetCookie();
    }
    var user = getCookie('username');
    if (user == null || user == '') {
        var msg = " <ul class=\"nav pull-right navbar-nav\" id=\"user\">" +
            " <li><a> <span class=\"glyphicon glyphicon-search\"></span></a></li>" +
            " <li><a onclick=\"location.href='html/login.html'\">登录</a></li>" +
            "<li><a onclick=\"location.href='html/regist.html'\">注册</a></li> </ul>"
        document.getElementById('user').innerHTML = msg;
    }
    else {
        document.getElementById('username').innerHTML = user + "<span class=\"caret\"></span>"
    }
}

function logOut() {
    clearCookie('username');
    clearCookie('userid');
    url = 'http://127.0.0.1/LoveUniversity/php/Service/UserService/Logout.php';
    $.get(url, function () {
        location.reload();
    });
}