<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 17:11
 */
session_start();
require_once '../../DAO/DAO.php';
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $xueid = (int)$_POST['xueid'];
    $str = "update xue set state  = 1 where FoodId = '{$xueid}'";
    up($str);
    $str = "update xue set GetUser  = null where FoodId = '{$xueid}'";
    up($str);
    echo '1';
}