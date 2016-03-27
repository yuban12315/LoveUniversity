<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/27
 * Time: 18:06
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
@$giveid = (int)$_GET['giveid'];
$str = "select * from give where GiveId = {$giveid}";
$row = sel($str);
echo ch_json_encode($row);