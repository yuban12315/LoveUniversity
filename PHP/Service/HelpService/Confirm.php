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
if ($_SESSION['userid']) {
    $userid = $_SESSION['userid'];
    @$helpid = $_POST['helpid'];
    @$paypassword = $_POST['password'];
    $str = "select * from help where HelpId = {$helpid} and UserId = {$userid}";
    $row = sel($str);
    $getuser = $row['GetUser'];
    $money = $row['HelpMoney'];
    $data = get($userid,$money,$getuser,$paypassword);
    if ($data == '1') {
        echo '1';
    } else {
        echo $data;
    }
}