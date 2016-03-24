<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/18
 * Time: 15:51
 */
session_start();
require_once '../../DAO/DAO.php';
/*调用选择测试
$_POST['giveid'] = 6;
$_POST['getuser'] = 1;
$_SESSION['userid'] = 25;
*/
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
    @$giveid = (int)$_POST['giveid'];
    @$getuser = (int)$_POST['getuser'];
    $str = "update give set GetUser = {$getuser} where GiveId = {$giveid}";
    up($str);
    $str = "update give set state = 0 where GiveId = {$giveid}";
    up($str);
    echo '1';
}