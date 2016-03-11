<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 13:01
 */
function secret($str)
{
    $str = md5($str);
    $str = md5($str);
    $str = md5($str);
}
?>