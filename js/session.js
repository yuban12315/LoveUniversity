function getSession() {
    var UserId;
    var url = 'http://127.0.0.1/LoveUniversity/php/Service/UserService/session.php';
    $.get(url, function (data, status) {
        return data;
    })
}