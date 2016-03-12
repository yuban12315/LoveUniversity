<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 12:41
 */
session_start();
require_once 'ch_json_encode.php';
require_once 'MD5.php';
/*$_SESSION['userid'] = 1;
$_SESSION['username'] = "acd";*/
if ($_SESSION!= null) {
    $array = $_SESSION;
    $_SESSION['useridmd5'] = md5($_SESSION['userid']);
    echo ch_json_encode($array);
}