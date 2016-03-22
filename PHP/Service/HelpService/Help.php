<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/22
 * Time: 14:47
 */
session_start();
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['userid'];
    @$helpid = $_POST['helpid'];
    @$comment = $_POST['comment'];
    $str = "update help set GetUser = {$getuser} where HelpId = {$helpid}";
    if (!empty($comment)) {
        if (xss($comment)) {
            echo "不要试图攻击";
        } else {
            $str = "insert into helpcomment (UserId,Comment,HelpId) VALUES ({$getuser},'{$comment}',{$helpid})";
            ins($str);
        }
    }
    echo '1';
}