<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 20:08
 */
require_once '../../DAO/DAO.php';
require_once 'ImageChange.php';
require_once 'Upload.php';
session_start();

if ($_SESSION == null) {
    echo "请登录";
} else {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    /*if ($_POST['username'] != null) {
        if($_POST['username']!=$row['UserName']) {
            $username = $_POST['username'];
            $str = "update user set UserMajor = '{$username}' where UserId = '{$userid}'";
            if(up($str)) {
                echo "修改成功";
            }
            else{
                echo "网络错误";
            }
        }
        else
        {
            echo "用户名已被注册";
            die();
        }
    }*/
    if ($_FILES['userphoto']['name'] != null) {
        $name = $_FILES['userphoto']['name'];
        $type = $_FILES['userphoto']['type'];
        $tmp_name = $_FILES['userphoto']['tmp_name'];
        $error = $_FILES['userphoto']['error'];
        $size = $_FILES['userphoto']['size'];
        $destination = "../../UserImage/User" . "$name";
        $rename = $userid.'.png';
        $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/'.$rename;
        if(buffer($type,$tmp_name,$destination)) {
            upload($destination, $rename);
            unlink($destination);
            $str = "update user set UserPhoto = '{$path}' where UserId = '{$userid}'";
            if(up($str))
            {
                echo "修改成功";
            }
            else{
                echo "网络错误";
            }
        }
    }
    if($_POST['oldpassword']!=null)
    {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $renewpassword = $_POST['renewpassword'];
        $str = "select * from user where UserId ='{$userid}' and PassWord = '{$oldpassword}'";
        if(sel($str))
        {
            if($newpassword!=$renewpassword) {
                $str = "update user set PassWord = '{$newpassword}' where UserId = '{$userid}'";
                if(up($str))
                {
                    echo "修改成功";
                }
                else{
                    echo "网络错误";
                }
            }
            else {
                echo "两次密码不一致";
            }
        }
        else {
            echo "密码错误";
        }
    }
}


