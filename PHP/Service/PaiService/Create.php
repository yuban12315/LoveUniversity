<?php
session_start();
require_once '../UserService/Buffer.php';
require_once '../UserService/Upload.php';
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if (isset($row['JwxtNumber'])) {
        if (empty($_POST['username']) || empty($_POST['paimoney']) || empty($_POST['downtime']) || empty($_POST['paiinformation'])) {
            echo '拍卖信息不完整';
        } else {
            @$postuser = $_POST['username'];
            @$paimoney = $_POST['paimoney'];
            @$downtime = $_POST['downtime'];
            @$paiinformation = $_POST['paiinformation'];
            if (xss($paimoney) || xss($paiinformation) || xss($downtime)) {
                echo '不要试图攻击';
                die();
            }
            $uptime = date("y-m-d h:m:s");
            $name = $_FILES['paiimage']['name'];
            $type = $_FILES['paiimage']['type'];
            $tmp_name = $_FILES['paiimage']['tmp_name'];
            $error = $_FILES['paiimage']['error'];
            $size = $_FILES['paiimage']['size'];
            $destination = "../../UserImage/Pai" . "$name";
            $rename = md5(uniqid(microtime(true), true)) . '.png';
            $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $rename;
            buffer($type, $tmp_name, $destination);
            upload($destination, $rename, 'paimai');
            unlink($destination);
            $str = "insert into pai (UserId,PostUser,PaiMoney,UpTime,DownTime,PaiInformation,PaiImage,state) VALUES ({$userid},'{$postuser}','{$paimoney}','{$uptime}','{$downtime}','{$paiinformation}','{$path}',1)";
            ins($str);
            echo "1";

        }
    } else {
        echo '请完善个人信息';
    }
}