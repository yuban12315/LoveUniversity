<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:51
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
require_once '../Payment/Pay.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        $getuser = $_SESSION['userid'];
        @$paimoney = (int)$_POST['paimoney'];
        if (xss($paimoney)) {
            echo '不要试图攻击';
            die();
        }
        $sum2 = 0;
        for ($i = 0; $i < strlen($paimoney); $i++) {
            if ($paimoney[$i] > '9' || $paimoney[$i] < '0') {
                $sum2++;
                break;
            }
        }
        if ($sum2) {
            echo '请输入正确的价格';
            die();
        }
        $paiid = (int)$_POST['paiid'];
        $str = "select * from pai where PaiId = {$paiid}";
        $row = sel($str);
        if ($paimoney <= $row['PaiMoney']) {
            echo '竞拍价格必须高于当前价格';
        } else {
            if (strtotime(date("y-m-d h:i:s")) < strtotime($row['DownTime'])) {
                echo '竞拍已结束';
            } else {
                if (!(empty($_POST['comment']))) {
                    @$comment = $_POST['comment'];
                    if (xss($comment)) {
                        echo '不要试图攻击';
                        die();
                    }
                    $str = "insert into comment (UserId,Comment,PaiId) VALUES ({$userid},{$comment})";
                    ins($str);
                }
                $str = "update pai set PaiMoney = {$paimoney} where PaiId = {$paiid}";
                up($str);
                $str = "update pai set GetUser = {$getuser} where PaiId = {$paiid}";
                up($str);
                $str = "select * from pai where PaiId = {$paiid}";
                $row = sel($str);
                pay($userid,$paimoney,$row['UserId'],);
                echo '1';
            }
        }
    }
}
