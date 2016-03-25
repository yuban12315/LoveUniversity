<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/23
 * Time: 19:14
 */
require_once '../../DAO/DAO.php';
/*支付调用方法
$_SESSION['userid'] = 25;
pay(10,27,'123456789');
*/
function pay($payid, $num, $getid, $paypassword)
{
    if (isset($_SESSION['userid'])) {
        $userid = $payid;
        $str = "select * from money where UserId = {$userid} and PayPassword = '{$paypassword}'";
        $row = sel($str);
        if ($row) {
            if ($row['Money'] >= $num) {
                $money = $row['Money'] - $num;
                $str = "update money set Money = {$money} where UserId = $userid";
                up($str);
                if ($getid != 0) {
                    $str = "select * from money where UserId = {$getid}";
                    $row = sel($str);
                    $money = $row['Money'] + $num;
                    $str = "update money set Money = {$money} where UserId = {$getid}";
                    up($str);
                }
                return '1';
            } else {
                return '余额不足，请充值';
            }
        } else {
            return '支付密码错误，请重新输入';
        }
    }
}