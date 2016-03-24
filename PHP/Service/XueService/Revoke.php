<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/24
 * Time: 19:57
 */
session_start();
require_once '../../DAO/DAO.php';
/*
$_SESSION['userid'] = 27;
$_POST['xueid'] = 7;
*/
if($_SESSION['userid'])
{
    $userid = $_SESSION['userid'];
    @$xueid = (int)$_POST['xueid'];
    $str = "update xue set state  = 1 where XueId = '{$xueid}' and GetUser = {$userid}";
    up($str);
    $str = "update xue set GetUser  = null where XueId = '{$xueid}' and GetUser = {$userid}";
    up($str);
    echo '1';
}