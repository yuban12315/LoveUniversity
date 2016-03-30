function money() {
    $("#up").click(function () {
        $("#Addmoney").val(parseInt($("#Addmoney").val()) + 1);
    });
    $("#down").click(function () {
        if (parseInt($("#Addmoney").val()) > 0) {
            $("#Addmoney").val(parseInt($("#Addmoney").val()) - 1);
        }
    });
}

function  Show(){
    $.getJSON('../../PHP/Service/PaiService/Details.php',{
        paiid:getCookie('master')
    }, function (data) {
        $("#msg")[0].innerHTML=' '+data.PaiInformation;
        $("#img").attr('src',data.PaiImage);
        setCookie('masterID',data.UserId);
        $("#title")[0].innerHTML=data.PaiTitle;
        $("#DownTime")[0].innerHTML+=data.DownTime;
        $("#money")[0].innerHTML+=data.PaiMoney+'元';
        $("#Addmoney").val(parseInt(data.PaiMoney)+1);
        var url='../../PHP/Service/UserService/GetData.php?userid='+data.GetUser;
        $.getJSON(url, function (data) {
            $("#GetUser")[0].innerHTML+=data.NickName;
        });
        url='../../PHP/Service/UserService/GetData.php?userid='+data.UserId;
        $.getJSON(url, function (data) {
            $("#nickname")[0].innerHTML=data.NickName;
        });
    });
}

