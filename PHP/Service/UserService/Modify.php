<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 20:08
 */
require_once '../../DAO/DAO.php';
require_once 'XSS.php';
require_once 'JwxtService.php';
session_start();
$_SESSION['userid'] = 27;
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    //修改昵称
    if (!empty($_POST['nickname'])) {
        @$newnickname = $_POST['newnickname'];
        if (xss($newnickname)) {
            echo '不要试图攻击！！！';
        } else {
            $str = "update user set NickName = '{$newnickname}' where UserId = '{$userid}'";
            up($str);
        }
    }
    //修改密码
    if (!empty($_POST['oldpassword'])) {
        @$oldpassword = $_POST['oldpassword'];
        @$newpassword = $_POST['newpassword'];
        @$renewpassword = $_POST['renewpassword'];
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
                    } else {
                        echo "两次密码不一致";
                    }
                } else {
                    echo "密码错误";
                }
            }
        }
    }

    //教务系统
    @$jwxtnumber = $_POST['jwxtnumber'];
    @$jwxtpassword = $_POST['jwxtpassword'];
    echo $jwxtnumber;
    if ($jwxtnumber&&$jwxtpassword) {
        //提交登录请求验证帐号密码
        if (loginservice($jwxtnumber, $jwxtpassword)=='1') {
            classservice($jwxtnumber, $jwxtpassword, $userid);
            inforservice($jwxtnumber, $userid);
            $str = "update user set JwxtNumber = '{$jwxtnumber}' where UserId = '{$userid}'";
            up($str);
            $str = "update user set JwxtPassword = '{$jwxtpassword}' where UserId = '{$userid}'";
            up($str);
        } else {
            echo "教务系统帐号密码不匹配";
        }
    }
    echo '1';
}


