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
    $conn = connect();
    $str = "select * from {$table} where state = 1";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    $total = 0;
    while ($row) {
        $total++;
        $row = mysqli_fetch_assoc($result);
    }
    if ($total % 10 == 0) {
        $total = $total / 10;
    } else {
        $total = $total / 10 + 1;
    }
    echo $total;
}
