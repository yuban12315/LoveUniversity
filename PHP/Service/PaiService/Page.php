<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 13:19
 */
require_once '../UserService/Page.php';
$table = 'pai';
@$page = (int)$_GET['page'];
Mypage($table,$page,'DownTime','PaiId');