<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:51
 */
if (isset($_SESSION['userid'])) {
    require_once '../../DAO/DAO.php';
    $userid = $_SESSION['userid'];
    $getuser = $_SESSION['username'];
    @$paimoney = $_POST['paimoney'];
    $paiid = $_POST['paiid'];
    $str = "select * from pai where PaiId = '{$paiid}'";
    $row = sel($str);
    if ($paimoney <= $row['PaiMoney']) {
        echo '竞拍价格必须高于当前价格';
    } else {
        if (strtotime(date("y-m-d h:i:s")) < strtotime($row[$time])) {
            echo '竞拍已结束';
        } else {
            if (isset($_POST['comment'])) {
                $comment = $_POST['comment'];
                $str = "insert into comment (UserId,Comment,PaiId) VALUES ('{$userid}','{$comment}')";
            }
            $str = "update pai set PaiMoney = '{$paimoney}' where PaiId = '{$paiid}'";
            up($str);
            $str = "update pai set GetUser = '{$getuser}' where PaiId = '{$paiid}'";
            up($str);
            echo '1';
        }
    }
}
