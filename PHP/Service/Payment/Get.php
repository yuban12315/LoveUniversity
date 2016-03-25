<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/25
 * Time: 12:27
 */
function get($payid, $num, $getid, $paypassword)
{
    if (isset($_SESSION['userid'])) {
        $userid = $payid;
        $str = "select * from money where UserId = {$userid} and PayPassword = '{$paypassword}'";
        $row = sel($str);
        if ($row) {
            if ($getid != 0) {
                $str = "select * from money where UserId = {$getid}";
                $row = sel($str);
                $money = $row['Money'] + $num;
                $str = "update money set Money = {$money} where UserId = {$getid}";
                up($str);
            }
            return '1';
        }
    } else {
        return '支付密码错误，请重新输入';
    }
}