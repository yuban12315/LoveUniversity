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
/*测试调用创建
$_SESSION['userid'] = 25;
$_SESSION['jwxtnumber'] = '111';
$_SESSION['username'] = 'admin';
$_POST['giveinformation'] = '111';
$_FILES['giveimage']['name'] = '11';
$rename = '111';
*/
if (isset($_SESSION['userid'])) {
    if (isset($_SESSION['bjbj'])) {
        if ($_SESSION['bjbj'] != "" && $_SESSION['bjbj'] != '图片文件过大' && $_SESSION['bjbj'] != '图片格式不正确') {
            $userid = $_SESSION['userid'];
            if (empty($_SESSION['jwxtnumber'])) {
                echo '请完善个人信息';
                die();
            } else {
                $giveuser = $_SESSION['username'];
                if (empty($_POST['giveinformation'])) {
                    echo '信息不能为空';
                } else {
                    @$giveinformation = $_POST['giveinformation'];
                    if (xss($giveinformation)) {
                        echo '不要试图攻击';
                        die();
                    }
                    $path = $_SESSION['bjbj'];
                    unset($_SESSION['bjbj']);
                    $str = "insert into give (UserId,GiveUser,GiveImage,GiveInformation,state) VALUES ('{$userid}','{$giveuser}','{$path}','{$giveinformation}',1)";
                    ins($str);
                    echo '1';
                }
            }
        } else {
            if ($_SESSION['bjbj'] == "") {
                echo '请选择图片';
                unset($_SESSION['bjbj']);
            } else {
                echo $_SESSION['bjbj'];
                unset($_SESSION['bjbj']);
            }
        }
    }
}
