<?php
//约
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['userid'];
    $str = "select * from run where GetUser = {$getuser}";
    $row = sel($str);
    if ($row && (strtotime(date("y-m-d h:i:s")) < strtotime($row['FoodTime']))) {
        echo '已有约会';
    } else {
        $foodid = (int)$_POST['foodid'];
        $str = "update food set state = 0 where FoodId = {$foodid}";
        up($str);
        $str = "update food set GetUser = '{$getuser}' where FoodId = {$foodid}";
        up($str);
        echo "成功";
    }
}