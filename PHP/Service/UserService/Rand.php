<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 16:17
 */
function randnum($i)
{
    $arr = array();
    while (count($arr) < $i) {
        $arr[] = rand(1, 9);
        $arr = array_unique($arr);
    }
    $_SESSION['vcode'] = implode($arr);
    return implode($arr);
}