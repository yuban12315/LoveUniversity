<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 20:40
 */
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    if (!empty($_POST['comment'])) {
        $userid = $_SESSION['userid'];
        $str1 = "select * from user where UserId = {$userid}";
        $row1 = sel($str1);
        if (empty($row1['JwxtNumber'])) {
            echo '请完善个人信息';
            die();
        } else {
            @$paiid = (int)$_POST['paiid'];
            $comment = $_POST['comment'];
            if (xss($comment)) {
                echo '不要试图攻击';
                die();
            }
            $str = "insert into comment (UserId,Comment,PaiId) VALUE ({$userid},'{$comment}',{$paiid})";
            ins($str);
            echo '1';
        }
    } else {
        echo '评论不能为空';
    }
}
