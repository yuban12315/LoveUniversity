<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/25
 * Time: 13:00
 */
session_start();
require_once '../../DAO/DAO.php';
$_SESSION['userid'] = 25;
$_POST['helpid'] = 2;
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
    @$helpid = $_POST['helpid'];
    $str = "select * from help where HelpId = {$helpid} and UserId = {$userid}";
    $row = sel($str);
    $money = $row['HelpMoney'];
    $str = "select * from money where UserId = {$userid}";
    $row = sel($str);
    $money = $row['Money']+$money;
    $str = "update money set Money = {$money} where UserId = {$userid}";
    up($str);
    $str = "delete from help where HelpId = {$helpid}";
    del($str);
    echo '1';
}