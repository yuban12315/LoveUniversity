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
    @$xueid = $_POST['xueid'];
    $str = "delete from xue where XueId = {$xueid} and UserId = {$userid}";
    del($str);
    echo '1';
}