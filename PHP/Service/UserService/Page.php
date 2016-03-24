<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:29
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
Mypage('xue',2,'XueTime','XueId');
function Mypage($table, $page, $time, $ID)
{
    $conn = connect();
    $start = ($page - 1) * 10;
    $end = ($page * 10 - 1);
    $str = "select * from {$table} limit {$start},{$end} ";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    $i = 0;
    while (!empty($row)) {

        if (strtotime(date("y-m-d h:i:s")) >= strtotime($row[$time])) {
            $id = $row[$ID];
            $str = "update {$table} set state = 0 where {$ID} = '{$id}'";
            up($str);
        }
        if ($row['state'] == 0 || strtotime(date("y-m-d h:i:s")) >= strtotime($row[$time])) {
            $row = mysqli_fetch_assoc($result);
            continue;
        }
        if(isset($_SESSION['userid'])) {
            if ($row['UserId'] == $_SESSION['userid']) {
                $row = mysqli_fetch_assoc($result);
                continue;
            }
        }
        unset($row['GetUser']);
        $i++;
        $array[$i-1] = $row;
        $row = mysqli_fetch_assoc($result);
    }
    if($i%10==0&&$i!=0)
    {
        $sum = 10;
    }
    else
    {
        $sum=$i%10;
    }
    $array['Num'] = ($sum);
    echo ch_json_encode($array);
}