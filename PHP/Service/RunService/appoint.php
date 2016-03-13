<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 15:49
 */
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['username'];
    $postuser = "";
    $str = "updata run set state = '0' where UserName = '{$postuser}";
    up($str);
    $str = "updata run set GetUser = '{$getuser}' where UserName = '{$postuser}";
    up($str);
    echo "成功";
}