<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/25
 * Time: 10:32
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../Payment/Get.php';
$_SESSION['userid'] = 25;
$_POST['helpid'] = 1;
$_POST['paypassword'] = '123456789';
if ($_SESSION['userid']) {
    $userid = $_SESSION['userid'];
    @$helpid = $_POST['helpid'];
    @$paypassword = $_POST['paypassword'];
    $str = "select * from help where HelpId = {$helpid} and UserId = {$userid}";
    $row = sel($str);
    $getuser = $row['GetUser'];
    $money = $row['HelpMoney'];
    $data = get($userid,$money,$getuser,$paypassword);
    if ($data == '1') {
        $str = "update help set Finish = 0 where HelpId = {$helpid}";
        up($str);
        echo '1';
    } else {
        echo $data;
    }
}