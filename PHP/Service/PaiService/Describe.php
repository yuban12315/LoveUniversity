<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 13:20
 */
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
@$runid = (int)$_GET['paiid'];
$str = "select * from pai where PaiId = '{$paiid}'";
$row = sel($str);
echo ch_json_encode($row);