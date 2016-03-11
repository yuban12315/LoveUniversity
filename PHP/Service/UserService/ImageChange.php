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