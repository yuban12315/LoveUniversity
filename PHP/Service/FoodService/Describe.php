<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 13:23
 */
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
@$foodid = $_GET['foodid'];
$str = "select * from food where FoodId = '{$foodid}'";
$row = sel($str);
echo ch_json_encode($row);