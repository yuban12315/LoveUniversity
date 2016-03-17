<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 13:22
 */
require_once '../UserService/Page.php';
$table = 'pai';
@$page = $_GET['page'];
Mypage($table,$page,'DownTime','PaiId');