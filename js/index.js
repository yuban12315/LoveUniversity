function Loaded(){
   var user =getName();
    if(user==null||user==''){
        var msg=" <ul class=\"nav pull-right navbar-nav\" id=\"user\">"+
       " <li><a> <span class=\"glyphicon glyphicon-search\"></span></a></li>"+
           " <li><a onclick=\"location.href='html/login.html'\">登录</a></li>"+
            "<li><a onclick=\"location.href='html/regist.html'\">注册</a></li> </ul>"
        $("#user").innerHTML=msg;
    }
    else{
        $("#username").innerHTML= user+"<span class=\"caret\"></span>"
    }
}