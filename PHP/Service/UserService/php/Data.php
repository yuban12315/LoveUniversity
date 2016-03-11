<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 19:00
 */
session_start();
require_once '../../../DAO/DAO.php';
$userid = $_SESSION['userid'];
if($userid!=null) {
    $str = 'select * from user where UserId = "' . $userid . '"';
    $str1 = 'select * from food where UserId = "' . $userid . '"';
    $str2 = 'select * from run where UserId = "' . $userid . '"';
    $str3 = 'select * from pai where UserId = "' . $userid . '"';
    $str4 = 'select * from xue where UserId = "' . $userid . '"';
    $PersonalData = sel($str);
    $FoodData = sel($str1);
    $RunData = sel($str2);
    $PaiData = sel($str3);
    $XueData = sel($str4);
    echo json_encode($PersonalData . $FoodData . $RunData . $PaiData . $XueData);
}
?>

