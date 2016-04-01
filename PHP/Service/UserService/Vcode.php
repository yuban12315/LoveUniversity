<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/10
 * Time: 13:39
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'Rand.php';
@$userphone = $_POST['userphone'];
/*判断手机号格式*/

if (strlen($userphone) != 11) {
    echo "请输入正确的手机号";
    die();
}
for ($i = 0; $i < strlen($userphone); $i++) {
    if ($userphone[$i] < '0' || $userphone[$i] > '9') {
        echo "请输入正确的手机号";
        die();
    }
}
$str = 'select * from user where UserPhone = "' . $userphone . '"';
$row = sel($str);
if ($row) {
    echo "该手机号已被注册";
    die();
}

message($userphone);

function message($userphone)
{

    $username = "yanyongjie";//短信宝帐户名
    $pass = md5("15296603340yyjqq");//短信宝帐户密码，md5加密后的字符串

    $checkCode = randnum(6);
    $content = "【爱大学】，您的验证码为" . $checkCode . "在1分钟内有效";
    $url = "http://www.smsbao.com/sms?u=" . $username . "&p=" . $pass . "&m=" . $userphone . "&c=" . $content;
    $html = file_get_contents($url);
    return $checkCode;
}
