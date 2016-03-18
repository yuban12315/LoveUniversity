<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 18:39
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/Upload.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $giveuser = $_SESSION['username'];
    if (empty($_POST['giveinformation']) || empty($_FILES['name'])) {
        echo '信息不能为空';
    } else {
        $giveinformation = $_POST['giveinformation'];
        if (xss($giveinformation)) {
            echo '不要试图攻击';
            die();
        }
        $rename = md5(uniqid(microtime(true), true)) . '.png';
        $tmp_name = $_FILES['photo']['tmp_name'];
        upload($tmp_name, $rename, 'give');
        $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $rename;
        $str = "insert into give (UserId,GiveUser,GiveImage,GiveInformation,state) VALUES ('{$userid}','{$giveuser}','{$path}','{$giveinformation}',1)";
        echo '1';
    }
}