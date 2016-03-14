<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:50
 */
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['username'];
    $xueid = (int)$_POST['xueid'];
    $str = "updata xue set state = '0' where XueId = '{$xueid}}";
    up($str);
    $str = "updata xue set GetUser = '{$getuser}' where XueId = '{$xueid}}";
    up($str);
    echo "成功";
}