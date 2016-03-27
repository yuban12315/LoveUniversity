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
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}
function MP($str)
{
//修改头像
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $src = $str;
        $mm = get_md5_string();
        $N=$mm.'.png';
        $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $mm .'.png';
        upload($src,$N, 'loveu');
        unlink($src);
        $str = "update user set UserPhoto = '{$path}' where UserId = '{$userid}'";
        up($str);
        $str = "update food set PostImage = '{$path}' where UserId = '{$userid}'";
        up($str);
        $str = "update help set HelpImage = '{$path}' where UserId = '{$userid}'";
        up($str);
        $str = "update run set PostImage = '{$path}' where UserId = '{$userid}'";
        up($str);
        $str = "update xue set PostImage = '{$path}' where UserId = '{$userid}'";
        up($str);
        echo "1";
    }
}