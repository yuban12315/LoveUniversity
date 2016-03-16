<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 12:51
 */
require_once '../UserService/Page.php';
$table = 'run';
@$page = $_GET['page'];
Mypage($table,$page,'RunTime','RunId');

