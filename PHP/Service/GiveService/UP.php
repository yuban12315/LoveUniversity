<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/15
 * Time: 13:37
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/Buffer.php';
require_once '../UserService/Upload.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        $src = $_FILES['file']['tmp_name'];
        $mm = get_md5_string();
        $N = $mm . '.png';
        $path = 'http://7xrxgm.com1.z0.glb.clouddn.com/' . $mm . '.png';
        $image = @imagecreatefromjpeg ($src);
        imagejpeg ($image,"Buffer/{$N}",9); /*压缩等级0-9，压缩后9最小，1最大*/
        upload($src, "Buffer/{$N}", 'give');
        $_SESSION['bjbj'] = $path;
    }
}
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}