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
    @$table = $_POST['table'];
    @$id = (int)$_POST['id'];
    $idname = '';
    switch($table)
    {
        case 'xue':$idname = 'XueId';break;
        case 'run':$idname = 'RunId';break;
        case 'food':$idname = 'FoodId';break;
        case 'give':$idname = 'GiveId';break;
    }
    $str = "update {$table} set state  = 1 where {$idname} = '{$id}' and GetUser = {$userid}";
    up($str);
    $str = "update {$table} set GetUser  = null where {$idname} = '{$id}' and GetUser = {$userid}";
    up($str);
    echo '1';
}