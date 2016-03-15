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
//修改头像
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    if (isset($_FILES['userphoto'])) {
        $name = $_FILES['userphoto']['name'];
        $type = $_FILES['userphoto']['type'];
        $tmp_name = $_FILES['userphoto']['tmp_name'];
        if($type)
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
        $destination = "../../UserImage/User" . $mm . '.png';
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
}