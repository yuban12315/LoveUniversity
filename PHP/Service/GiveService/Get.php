<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/18
 * Time: 15:12
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
/*
$_SESSION['userid'] = 27;
$_POST['giveid'] = 6;
$_SESSION['jwxtnumber'] = '111';
$_POST['getinformation'] = '111';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        if (empty($_POST['getinformation'])) {
            echo "信息不能为空";
        } else {
            $getinformation = $_POST['getinformation'];
            if (xss($getinformation)) {
                echo '不要试图攻击';
                die();
            }
            @$giveid = $_POST['giveid'];
            $str = "select * from gets where UserId = {$userid} and GiveId = {$giveid}";
            if (sel($str)) {
                echo '不要尝试刷评论';
            } else {
                $str = "select * from give where GiveId = {$giveid}";
                $row = sel($str);
                if ($row) {
                    if ($row['state'] == 1) {
                        $userid = $_SESSION['userid'];
                        $str = "insert into gets (UserId,GetInformation,GiveId) VALUES ('{$userid}','{$getinformation}','{$giveid}')";
                        ins($str);
                        echo '1';
                    } else {
                        echo '你来晚了，礼物已经被主人送出了';
                    }
                } else {
                    echo '礼物被主人删除了';
                }
            }
        }
    }
}