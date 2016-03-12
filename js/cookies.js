function setCookie(name, value, expiredays) {
    var c_time = new Date();
    c_time.setDate(c_time.getDate() + expiredays);
    document.cookie = name + '=' + escape(value) + ((expiredays == null) ?
            "" : ";expires=" + c_time.toUTCString()) + ";path=/";
}

function getCookie(name) {
    if (document.cookie.length > 0) {
        var c_start = document.cookie.indexOf(name + '=');
        if (c_start != -1) {
            c_start += name.length + 1;
            var c_end = document.cookie.indexOf(';', c_start);
            if (c_end == -1)
                c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return '';
}

function showName() {
    var username = GetCookie('username');
    var name=document.getElementById('name');
    if (username != "" && username != null) {
        var msg = 'Welcome ' + username + '!';
        msg+='<a href="html/login.html" class="back">Logout</a>';
        name.innerHTML = msg;
    }
    else {
        var msg='Welcome Guest! --<span>Click for Login</span>';
        name.innerHTML=msg;
        name.onclick=function login(){
            location.href='html/login.html';
        }
    }
}
