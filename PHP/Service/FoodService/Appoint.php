<?php
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['username'];
    $foodid = "";
    $str = "updata food set state = '0' where FoodId = '{$foodid}}";
    up($str);
    $str = "updata food set GetUser = '{$getuser}' where FoodId = '{$foodid}}";
    up($str);
    echo "成功";
}