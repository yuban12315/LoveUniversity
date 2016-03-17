<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 15:49
 */
//约
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['username'];
    $runid = (int)$_POST['runid'];
    $str = "updata run set state = '0' where  RunId = '{$runid}}";
    up($str);
    $str = "updata run set GetUser = '{$getuser}' where  RunId = '{$runid}}";
    up($str);
    echo "成功";
}