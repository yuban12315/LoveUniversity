<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 17:09
 */
session_start();
require_once '../../DAO/DAO.php';
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $runid = (int)$_POST['runid'];
    $str = "update run set state  = 1 where RunId = '{$runid}'";
    up($str);
    $str = "update run set GetUser  = null where RunId = '{$runid}'";
    up($str);
    echo '1';
}