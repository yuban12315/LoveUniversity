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
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type =  strtolower(end(explode(".",$name)));
        if ($size == 0) {
            $_SESSION['bjbj'] =  '图片文件过大';
            die();
        }
        $mm = get_md5_string();
        $N = $mm . '.png';
        $path = 'http://7xrxgm.com1.z0.glb.clouddn.com/' . $mm . '.png';
        /*
        switch ($type) {
            case "jpeg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                echo 1;
                break;
            case "pjpeg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                echo 1;
                break;
            case "jpg":
                $image = @imagecreatefromjpeg($src);
                imagejpeg($image, "Buffer/{$N}", 9);
                echo 1;
                break;
            case "png":
                $image = @imagecreatefrompng($src);
                imagepng($image, "Buffer/{$N}", 9);
                echo 1;
                break;
            default:
                $_SESSION['bjbj'] = '图片格式不正确';
                die();
        }
        */
        $image = @imagecreatefromjpeg($src);
        imagejpeg($image, "Buffer/{$N}", 9);
        $_SESSION['bjbj'] = $path;
        upload("Buffer/{$N}", $N, 'give');
        //unlink("Buffer/{$N}");

    }
}
function get_md5_string()
{
    return md5(uniqid(microtime(true), true));
}