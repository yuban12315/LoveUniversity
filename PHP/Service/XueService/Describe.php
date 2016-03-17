<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 14:04
 */
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
@$xueid = (int)$_GET['xueid'];
$str = "select * from xue where XueId = '{$xueid}'";
$row = sel($str);
echo ch_json_encode($row);