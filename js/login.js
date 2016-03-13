$(document).ready(function () {
    clearCookie('username');
    clearCookie('userid');
    $("#login").click(function () {
        var url = '../PHP/Service/UserService/Login.php';
        var username = $("#username").val();
        var password = $("#password").val();
        $.post(url, {
            username: username,
            password: password
        }, function (data, status) {
            if (data[0] == '1') {
                var url = 'http://127.0.0.1/LoveUniversity/php/Service/UserService/Session.php';
                $.getJSON(url, function (data) {
                    var id =data.userid;
                    setCookie('username',username);
                    setCookie('userid',id);
                    location.href='../index.html';
                });
            }
            else {
                var msg = '<p>' + data + '</p>';
                $("#wrong").innerHTML = msg;
                document.getElementById('wrong').innerHTML = msg;
                $("#alert").click();
            }
        });
    });
});