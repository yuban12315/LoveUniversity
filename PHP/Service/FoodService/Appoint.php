<?php
//约
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['username'];
    $foodid = (int)$_POST['foodid'];
    $str = "update food set state = 0 where FoodId = '{$foodid}}'";
    up($str);
    $str = "update food set GetUser = '{$getuser}' where FoodId = '{$foodid}}";
    up($str);
    echo "成功";
}