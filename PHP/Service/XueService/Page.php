<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 14:03
 */
require_once '../UserService/Page.php';
$table = 'xue';
@$page = $_GET['page'];
Mypage($table,$page,'XueTime','XueId');