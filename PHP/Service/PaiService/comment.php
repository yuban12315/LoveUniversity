<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 20:40
 */
session_start();
//调用测试
/*
$_SESSION['userid'] = '25';
$_POST['comment'] = '111';
$_POST['paiid'] = 2;
$_SESSION['jwxtnumber'] = '111';
*/
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    if (!empty($_POST['comment'])) {
        $userid = $_SESSION['userid'];
        if (empty($_SESSION['jwxtnumber'])) {
            echo '请完善个人信息';
            die();
        } else {
            $str = "select * from comment where UserId = {$userid}";
            if (sel($str)) {
                echo '留言机会只有一次哦';
            } else {
                @$paiid = (int)$_POST['paiid'];
                $comment = xss($_POST['comment']);
                $str = "insert into comment (UserId,Comment,PaiId) VALUE ({$userid},'{$comment}',{$paiid})";
                ins($str);
                echo '1';
            }
        }
    } else {
        echo '评论不能为空';
    }
}
