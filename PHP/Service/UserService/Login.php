<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/8
 * Time: 20:26
 */
require_once '../../DAO/DAO.php';
require_once 'MD5.php';
session_start();
@$username = $_POST['username'];
@$password = $_POST['password'];
/*
 $username = "admin";
 $password = "123456789";
*/

if($username==null)
{
    echo "用户名不能为空！";
    die();
}
else
{
    if($password==null)
    {
        echo "密码不能为空！";
        die();
    }
}
$sum2 = 0;
for ($i = 0; $i < strlen($username); $i++) {
    if ($username[$i] > '9' || $username[$i] < '0') {
        $sum2++;
        break;
    }
}

if($sum2==0) {
    $str = 'select * from user where UserPhone = "'.$username.'" and PassWord = "'.$password.'"';
}
else {
    $str = 'select * from user where UserName = "' . $username . '" and PassWord = "' . $password . '"';
}
$row = sel($str);
if($row) {
    if ($row['PassWord'] == $password) {
        $_SESSION['userid'] = $row['UserId'];
        $_SESSION['username'] = $row['UserName'];
        $_SESSION['nickname'] = $row['NickName'];
        $_SESSION['userphoto'] = $row['UserPhoto'];
        $_SESSION['useridmd5'] = secret($_SESSION['userid']);
        $_SESSION['jwxtnumber'] = $row['JwxtNumber'];
        echo '1';
    }
}
else
{
    echo "用户名或密码错误！";
}
?>