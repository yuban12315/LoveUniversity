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
    @$id = (int)$_POST['id'];
    @$idname = $_POST['idname'];
    $str = "update xue set state  = 1 where {$idname} = '{$id}' and GetUser = {$userid}";
    up($str);
    $str = "update xue set GetUser  = null where {$idname} = '{$id}' and GetUser = {$userid}";
    up($str);
    echo '1';
}