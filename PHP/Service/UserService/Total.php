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
    $total = $row['count(*)'];
    if ($total % 10 == 0) {
        $total = floor($total / 10);
    } else {
        $total = floor($total/10)+1;
    }
    echo $total;
}
