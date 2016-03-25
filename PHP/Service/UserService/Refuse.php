<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 17:11
 */
session_start();
require_once '../../DAO/DAO.php';
/*测试调用拒绝方法
$_SESSION['userid'] = 26;
$_POST['id'] = 2;
$_POST['table'] = 'food';
*/
if(isset($_SESSION['userid'])) {
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
    $str = "update {$table} set state  = 1 where {$idname} = {$id} and UserId = {$userid}";
    up($str);
    $str = "update {$table} set GetUser  = null where {$idname} = {$id} and UserId = {$userid}";
    up($str);
    echo '1';
}