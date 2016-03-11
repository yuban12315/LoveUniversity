<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/10
 * Time: 13:39
 */
session_start();
$arr=array();
while(count($arr)<6)
{
    $arr[]=rand(1,9);
    $arr=array_unique($arr);
}
$_SESSION['phoneunicode'] = implode($arr);
echo implode($arr);