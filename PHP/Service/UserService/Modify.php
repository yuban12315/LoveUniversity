<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 20:08
 */
require_once '../../DAO/DAO.php';
require_once 'XSS.php';

session_start();
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    //修改昵称
    if (isset($_POST['nickname'])) {
        $newnickname = $_POST['newnickname'];
        if (xss($newnickname)) {
            echo '不要试图攻击！！！';
        } else {
            $str = "update user set NickName = '{$newnickname}' where UserId = '{$userid}'";
            up($str);
            echo '1';
        }
    }
    //修改密码
    if (isset($_POST['oldpassword'])) {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $renewpassword = $_POST['renewpassword'];
        if (xss($newpassword)) {
            echo '不要试图攻击！！！';
        } else {
            if (strlen($newpassword) < 8 || strlen($newpassword) > 16) {
                echo "密码长度应为8-16位";
            } else {
                $str = "select * from user where UserId ='{$userid}' and PassWord = '{$oldpassword}'";
                if (sel($str)) {
                    if ($newpassword != $renewpassword) {
                        $str = "update user set PassWord = '{$newpassword}' where UserId = '{$userid}'";
                        up($str);
                        echo "1";
                    } else {
                        echo "两次密码不一致";
                    }
                } else {
                    echo "密码错误";
                }
            }
        }
    }
}


