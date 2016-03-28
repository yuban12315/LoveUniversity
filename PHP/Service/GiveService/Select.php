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
    $str = "select * from give where GiveId = {$giveid} and UserId = {$userid}";
    $row = sel($str);
    if(empty($row['GetUser'])) {
        $str = "update give set GetUser = {$getuser} where GiveId = {$giveid}";
        up($str);
        $str = "update give set state = 0 where GiveId = {$giveid}";
        up($str);
        echo '1';
    }
    else{
        echo '送出去的东西泼出去的水，礼物送人了不可以收回的哦';
    }
}