<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 13:24
 */
require_once '../../DAO/DAO.php';
function Total($table)
{
    $str = "select count(*) from {$table} where state = 1";
    $row = sel($str);
    echo $row['count(*)'];
}
