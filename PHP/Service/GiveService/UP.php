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
        $type = $_FILES['file']['type'];
        $size = $_FILES['files']['size'];
        if ($size > 1 * 1024 * 1024) {
            echo '图片文件过大';
            die();
        }
        $mm = get_md5_string();
        $N = $mm . '.png';
        $path = 'http://7xrxgm.com1.z0.glb.clouddn.com/' . $mm . '.png';
        switch ($type) {
            case "image/jpeg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                break;
            case "image/pjpeg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                break;
            case "image/jpg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                break;
            case "image/png":
                $image = @imagecreatefrompng($src);
                imagepng($image, "Buffer/{$N}", 9);
                break;
            default:
                echo '图片格式不正确';
                die();
        }
        $_SESSION['bjbj'] = $path;
        upload($src, $N, 'give');
        unlink("Buffer/{$N}");

    }
}
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}