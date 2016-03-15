<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/15
 * Time: 13:37
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'Buffer.php';
require_once 'Upload.php';
require_once 'Rand.php';
function MP()
{
//修改头像
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $src = $_SESSION['src'];
        $mm = randnum(10);
        $mm = md5($mm);
        $N = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $mm;
        $str = "select * from user where UserPhoto = '{$N}'";
        while (sel($str)) {
            $mm = randnum(10);
            $mm = secret($mm);
            $N = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $mm;
            $str = "select * from user where UserPhoto = '{$N}'";
        }
        $destination = "../../UserImage/User" . $src . '.png';
        $rename = $mm . '.png';
        $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $rename;
        upload($destination, $rename, 'loveu');
        unlink($destination);
        $str = "update user set UserPhoto = '{$path}' where UserId = '{$userid}'";
        up($str);
        echo "1";
    }
}