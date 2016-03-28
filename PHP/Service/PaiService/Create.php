<?php
session_start();
require_once '../UserService/Buffer.php';
require_once '../UserService/Upload.php';
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
/*拍卖创建测试
$_SESSION['userid'] = 27;
$_SESSION['paibj'] = '1111';
$_SESSION['username'] = 'misakamikoto';
$_SESSION['jwxtnumber'] = '111';
$_POST['paimoney'] = '1';
$_POST['downtime'] = '2016-07-08 16:00:00';
$_POST['paiinformation'] = 'ahahha';
$_POST['paititle'] = 'dididi';
*/
if (isset($_SESSION['userid'])) {
    if (isset($_SESSION['paibj'])) {
        $userid = $_SESSION['userid'];
        if (!empty($_SESSION['jwxtnumber'])) {
            if (empty($_POST['paimoney']) || empty($_POST['downtime']) || empty($_POST['paiinformation']) || empty($_POST['paititle'])) {
                echo '拍卖信息不完整';
            } else {
                @$postuser = $_SESSION['username'];
                @$paimoney = xss($_POST['paimoney']);
                @$downtime = $_POST['downtime'];
                @$paiinformation = xss($_POST['paiinformation']);
                @$paititle = xss($_POST['paititle']);
                if (strtotime(date("y-m-d h:i:s")) >= strtotime($downtime)) {
                    echo '请输入正确的时间';
                } else {
                    $uptime = date("y-m-d h:m:s");
                    $path = $_SESSION['paibj'];
                    unset($_SESSION['paibj']);
                    $str = "insert into pai (UserId,PostUser,PaiMoney,UpTime,DownTime,PaiInformation,PaiImage,state,PaiTitle) VALUES ({$userid},'{$postuser}','{$paimoney}','{$uptime}','{$downtime}','{$paiinformation}','{$path}',1,'{$paititle}')";
                    ins($str);
                    echo "1";
                }
            }

        } else {
            echo '请完善个人信息';
        }
    } else {
        echo '请选择图片';
    }
}