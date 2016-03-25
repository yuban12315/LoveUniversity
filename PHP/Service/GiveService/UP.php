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
    $src = $_FILES['file']['tmp_name'];
    $mm = get_md5_string();
    $N = $mm . '.png';
    $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/' . $mm . '.png';
    upload($src, $N, 'give');
    unlink($src);
    $_SESSION['bjbj'] = $path;
    echo "1";
}
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}