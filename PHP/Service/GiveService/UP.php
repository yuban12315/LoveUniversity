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
        upload($src, $N, 'give');
        $_SESSION['bjbj'] = $path;
    }
}
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}