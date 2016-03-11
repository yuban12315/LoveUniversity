<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 20:08
 */
require_once '../../../DAO/DAO.php';
session_start();
$userid=  $_SESSION['userid'];
if($userid==null)
{
    echo "请登录";
}
else {
    $truename = $_POST['truename'];
    $usersex = $_POST['usersex'];
    $usergrade = $_POST['usergrade'];
    $usermajor = $_POST['usermajor'];
    $name = $_FILES['photo']['name'];
    rename($name, $username . "=" . $name);
    $type = $_FILES['photo']['type'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];
    $size = $_FILES['photo']['size'];
    $destination = '/var/www/html/yue/userphotos/' . $username . "=" . $name;


}