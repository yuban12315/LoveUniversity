<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 20:40
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    if (!empty($_POST['comment'])) {
        $userid = $_SESSION['userid'];
        if (empty($row1['jwxtnumber'])) {
            echo '请完善个人信息';
            die();
        } else {
            @$paiid = (int)$_POST['paiid'];
            $comment = xss($_POST['comment']);
            $str = "insert into comment (UserId,Comment,PaiId) VALUE ({$userid},'{$comment}',{$paiid})";
            ins($str);
            echo '1';
        }
    } else {
        echo '评论不能为空';
    }
}
