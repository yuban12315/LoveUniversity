<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 16:37
 */
//拒绝
session_start();
require_once '../../DAO/DAO.php';
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    @$foodid = (int)$_POST['foodid'];
    $str = "update food set state  = 1 where FoodId = '{$foodid}'";
    up($str);
    $str = "update food set GetUser  = null where FoodId = '{$foodid}'";
    up($str);
    echo '1';
}