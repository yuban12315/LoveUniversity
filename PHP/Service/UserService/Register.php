<?php
session_start();
header("Content-type: text/html; charset=utf-8");
require_once "../../DAO/DAO.php";
require_once "MD5.php";
require_once "XSS.php";
@$username = xss($_POST['username']);
@$password = xss($_POST['password']);
@$repassword = $_POST['repassword'];
@$usersex = $_POST['usersex'];
@$userphone = xss($_POST['userphone']);
@$vcode = $_POST['vcode'];
if ($usersex == "Girl") {
    $usersex = 0;
    $path = "http://7xrqhs.com1.z0.glb.clouddn.com/default0.jpg";
} else {
    $usersex = 1;
    $path = "http://7xrqhs.com1.z0.glb.clouddn.com/default1.jpg";
}
/*
$Punicode = $_POST['phoneunicode'];
$phoneunicode = $_SESSION['phoneunicode'];
if($Punicode!=$phoneunicode)
{
echo "验证码不正确";
}
*/
$json = Pending($username, $password, $userphone, $usersex, $repassword);
if ($json == "1"&&$vcode == $_SESSION['vcode']) {

    $str = "insert into user (UserName,PassWord,UserSex,UserPhone,UserPhoto,NickName) VALUES ('{$username}','{$password}','{$usersex}','{$userphone}','{$path}','{$username}')";
    ins($str);
    $str = "select * from user where UserName = '{$username}'";
    $row = sel($str);
    $_SESSION['userid'] = $row['UserId'];
    $_SESSION['username'] = $row['UserName'];
    $_SESSION['nickname'] = $row['NickName'];
    $_SESSION['userphoto'] = $row['UserPhoto'];
    $_SESSION['useridmd5'] = secret($_SESSION['userid']);
    $str = "insert into money (UserId,Money) VALUES ({$row['UserId']},0)";
    ins($str);
    echo $json;
} else {
    echo $json;
}
function Pending($username, $password, $userphone, $usersex, $repassword)
{
    /*判空*/
    if ($username == null) {
        return "请输入用户名";
    }
    if ($password == null) {
        return "请输入密码";
    }
    if ($repassword == null) {
        return "请再输入一次密码";
    }
    if ($userphone == null) {
        return "请输入手机号";
    }

    if ($usersex == null) {
        return "请选择性别";
    }
    /*判断用户名格式*/
    if (strlen($username >= 18)) {
        return "用户名应为18位以下的数字和字母组合";
    }
    $sum1 = 0;
    $sum2 = 0;
    for ($i = 0; $i < strlen($username); $i++) {
        if ($username[$i] >= '0' && $username[$i] <= '9') {
            $sum1++;
            break;
        }
    }
    for ($i = 0; $i < strlen($username); $i++) {
        if ($username[$i] > '9' || $username[$i] < '0') {
            $sum2++;
            break;
        }
    }

    if ($sum2 == 0) {
        return "用户名不应为纯数字";
    }
    /*判断密码格式*/
    if ($password != $repassword) {
        return "两次密码不一致";
    }
    if (strlen($password) < 8 || strlen($password) > 16) {
        return "密码长度应为8-16位";
    }

    /*判重*/
    $str1 = 'select * from user where UserName = "' . $username . '"';

    $row1 = sel($str1);

    if ($row1) {
        return "用户名已存在";
    }
    return "1";
}

?>