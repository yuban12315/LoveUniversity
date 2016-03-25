<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/24
 * Time: 13:05
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/ch_json_encode.php';
function comment($table,$page, $ID,$id,$Id)
{
    $start = ($page-1) * 10;
    $end = ($page)*10;
    $array = '';
    $conn = connect();
    $str = "select * from {$table} where {$ID} = {$id} order by $Id desc";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
    $i = 0;
    while ($row) {
        $array[$i] = $row;
        $i++;
        $row = mysqli_fetch_assoc($result);
    }
    $array['num'] = $i;
    echo ch_json_encode($array);
}

