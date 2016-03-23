<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/23
 * Time: 19:13
 */
session_start();
require_once '../../DAO/DAO.php';
/*调用充值方法
$_SESSION['userid'] = 25;
recharge(100,25);
*/
function recharge($num,$userid)
{
    if(isset($_SESSION['userid']))
    {;
        $str = "select * from money where UserId = {$userid}";
        $row = sel($str);
        $money = $row['Money']+$num;
        $str = "update money set Money = {$money} where UserId = {$userid}";
        up($str);
        echo '1';
    }
}