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
    if (isset($_POST['comment'])) {
        $userid = $_SESSION['userid'];
        $paiid = $_POST['paiid'];
        $comment = $_POST['comment'];
        $str = "insert into comment (UserId,Comment,PaiId) VALUE ('{$userid}','{$comment}','{$paiid}')";
        ins($str);
        echo '1';
    } else {
        echo '评论不能为空';
    }
}