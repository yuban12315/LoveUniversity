<?php
session_start();
header("Content-type: text/html; charset=utf-8");
require_once "../../DAO/DAO.php";
require_once "MD5.php";
require_once "XSS.php";
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$usersex = $_POST['usersex'];
$userphone = $_POST['userphone'];
/*
$Punicode = $_POST['phoneunicode'];
$phoneunicode = $_SESSION['phoneunicode'];
if($Punicode!=$phoneunicode)
{
echo "验证码不正确";
}
*/
$path = "UserImage/System/Head.jpg";
$json = Pending($username, $password, $userphone, $usersex, $repassword);
if ($json == "注册成功") {

    $str = "insert into user (UserName,PassWord,TrueName,UserSex,UserGrade,UserMajor,UserPhone,UserPhoto) VALUES ('{$username}','{$password}','{$truename}','{$usersex}','{$usergrade}','{$usermajor}','{$userphone}','{$path}')";
    if (ins($str)) {
        echo $json;
    } else {
        echo "网络错误，注册失败";
    }
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
    /*过滤*/
    if (xss($username) || xss($password) || xss($userphone)) {
        return "不要试图攻击！！！";
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
    /*判断手机号格式*/
    if (strlen($userphone) != 11) {
        return "手机号应为11位纯数字";
    }
    for ($i = 0; $i < strlen($userphone); $i++) {
        if ($userphone[$i] < '0' || $userphone[$i] > '9') {
            return "手机号应为11位纯数字";
        }
    }
    /*判重*/
    $str1 = 'select * from user where UserName = "' . $username . '"';
    $str2 = 'select * from user where UserPhone = "' . $userphone . '"';
    $row1 = sel($str1);
    $row2 = sel($str2);
    if ($row1) {
        return "用户名已存在";
    }
    if ($row2) {
        return "该手机号已被注册";
    }
    return "注册成功";
}

?>