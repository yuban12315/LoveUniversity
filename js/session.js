function getName(){
    var url = 'http://127.0.0.1/LoveUniversity/php/Service/UserService/session.php';
    $.getJSON(url, function (data) {
        var id=data.useid;
        
    })
}