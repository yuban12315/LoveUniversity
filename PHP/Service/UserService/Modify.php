<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 20:08
 */
require_once '../../DAO/DAO.php';
require_once 'Buffer.php';
require_once 'Upload.php';
require_once 'XSS.php';
require_once 'Rand.php';
session_start();
$_SESSION['userid'] = 1;
if ($_SESSION == null) {
    echo "请登录";
} else {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    //修改昵称
    if (isset($_POST['nickname'])) {
        $newnickname = $_POST['newnickname'];
        if (xss($newnickname)) {
            echo '不要试图攻击！！！';
        } else {
            $str = "update user set NickName = '{$newnickname}' where UserId = '{$userid}'";
            echo '1';
        }
    }
    //修改头像
    if (isset($_FILES['userphoto'])) {
        $name = $_FILES['userphoto']['name'];
        $type = $_FILES['userphoto']['type'];
        $tmp_name = $_FILES['userphoto']['tmp_name'];
        $error = $_FILES['userphoto']['error'];
        $size = $_FILES['userphoto']['size'];
        $mm = randnum(10);
        $mm = secret($mm);
        $N = 'http://7xrqhs.com1.z0.glb.clouddn.com/'.$mm;
        $str = "select * from user where UserPhoto = '{$N}'";
        while(sel($str))
        {
            $mm = randnum(10);
            $mm = secret($mm);
            $N = 'http://7xrqhs.com1.z0.glb.clouddn.com/'.$mm;
            $str = "select * from user where UserPhoto = '{$N}'";
        }
        $destination = "../../UserImage/User" . $mm.'.png';
        $rename = $mm . '.png';
        $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $rename;
        if (buffer($type, $tmp_name, $destination)) {
            upload($destination, $rename, 'loveu');
            unlink($destination);
            $str = "update user set UserPhoto = '{$path}' where UserId = '{$userid}'";
            up($str);
            echo "1";
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


