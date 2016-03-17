<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 13:22
 */
//当前页所有信息
require_once '../UserService/Page.php';
$table = 'food';
@$page = (int)$_GET['page'];
Mypage($table,$page,'FoodTime','FoodId');