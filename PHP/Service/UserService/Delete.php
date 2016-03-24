<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/24
 * Time: 19:43
 */
session_start();
require_once '../../DAO/DAO.php';
/*测试调用删除自己创建的
$_POST['xueid'] = 2;
$_SESSION['userid'] = 18;
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
        case 'pai':$idname = 'PaiId';break;
        case 'help':$idname = 'HelpId';break;
        case 'give':$idname = 'GiveId';break;
    }
    $str = "delete from {$table} where {$idname} = {$id} and UserId = {$userid}";
    del($str);
    echo '1';
}