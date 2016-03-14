$(document).ready(function () {
    var url = '../PHP/Service/UserService/Vcode.php';
    $("#Vcode").click(function () {
        $.post('../PHP/Service/UserService/Vcode.php', {
            userphone: $("#mobile").val()
        }, function (data) {
            if (data[0] != '0' ) {
                var msg = '<p>' + data + '</p>';
                $("#wrong").innerHTML = msg;
                document.getElementById('wrong').innerHTML = msg;
                $("#alert").click();
            }
        });
    });

    url = '../PHP/Service/UserService/Register.php';
    $("#regist").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var mobile = $("#mobile").val();
        var vcode = $("#code").val();
        var sex = $("#sex").val();
        $.post(url, {
            username: username,
            password: password,
            repassword: password2,
            usersex: sex,
            userphone: mobile,
            vcode: vcode
        }, function (data, status) {
            if (data[0] == '1') {
                url = 'http://127.0.0.1/LoveUniversity/php/Service/UserService/Session.php';
                $.getJSON(url, function (data) {
                    var id = data.userid;
                    setCookie('username', username);
                    setCookie('userid', id);
                    location.href = '../index.html';
                });
            }
            else {
                var msg = '<p>' + data + '</p>';
                $("#wrong").innerHTML = msg;
                document.getElementById('wrong').innerHTML = msg;
                $("#alert").click();
            }
        })
    })
})