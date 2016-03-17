<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 12:48
 */
//约会详细信息
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
@$runid = (int)$_GET['runid'];
$str = "select * from run where RunId = '{$runid}'";
$row = sel($str);
echo ch_json_encode($row);


