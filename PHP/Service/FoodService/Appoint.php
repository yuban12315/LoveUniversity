<?php
//约
session_start();
require_once '../../DAO/DAO.php';
/*
$_SESSION['userid'] = 25;
$_POST['foodid'] = 5;
*/
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['userid'];
    $str = "select * from food where GetUser = {$getuser}";
    $row = sel($str);
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        if ($row && (strtotime(date("y-m-d h:i:s")) < strtotime($row['FoodTime']))) {
            echo '已有约会';
        } else {
            @$foodid = (int)$_POST['foodid'];
            $str = "select * from food where FoodId = {$foodid}";
            $row = sel($str);
            if ($row) {
                if ($row['state'] == 1) {
                    $str = "update food set state = 0 where FoodId = {$foodid}";
                    up($str);
                    $str = "update food set GetUser = '{$getuser}' where FoodId = {$foodid}";
                    up($str);
                    echo "1";
                } else {
                    echo '你来晚了，ta已经被约了';
                }
            } else {
                echo '约会已被删除';
            }
        }
    }
}