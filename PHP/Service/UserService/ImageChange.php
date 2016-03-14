<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/11
 * Time: 10:57
 */
function buffer($type, $tmp_name, $destination)
{
    if ($type == "image/gif" || $type == "image/jpeg" || $type == "image/pjpeg" || $type == "image/jpg" || $type == "image/png") {
        if ($tmp_name) {
            if (move_uploaded_file($tmp_name, $destination)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function change($url, $newwidth, $newheight)
{
    $img = $url;
    $size = getimagesize($img);
    $src_w = $size[0];
    $src_h = $size[1];
    $w = $newwidth;
    $h = $newheight;
    $h2 = $src_h * ($w / $src_w);
    $w2 = $src_w * ($h / $src_h);
    if ($h2 < $h) $h = $h2;
    if ($w2 < $w) $w = $w2;
    $new_image = imagecreatetruecolor($w, $h);
    if ($size[2] == 1) {
        $src_image = imagecreatefromgif($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } elseif ($size[2] == 2) {
        $src_image = imagecreatefromjpeg($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } else {
        $src_image = imagecreatefrompng($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    }
    unlink($url);
    imagejpeg($new_image,$url);
    imagedestroy($new_image);
    imagedestroy($src_image);
}