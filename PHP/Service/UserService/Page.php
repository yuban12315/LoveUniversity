<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:29
 */
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
Mypage('run', 1, 'RunTime', 'RunId');
function Mypage($table, $page, $time, $ID)
{
    $conn = connect();
    $str = "select * from {$table} ";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    $i = 0;

    echo '[';
    while ($i <= ($page * 10 - 1) && $row) {

/*
        if (strtotime(date("y-m-d h:i:s")) >= strtotime($row[$time])) {
            $id = $row[$ID];
            $str = "update {$table} set state = 0 where {$ID} = '{$id}'";
            up($str);
        }
        if ($row['state'] == 0 || strtotime(date("y-m-d h:i:s")) >= strtotime($row[$time])) {
            $row = mysqli_fetch_assoc($result);
            continue;
        }*/
        unset($row['GetUser']);
        $i++;
        if ($i >= ($page - 1) * 10) {
            echo ch_json_encode($row);
            echo ",";
        }
        $row = mysqli_fetch_assoc($result);
    }
    echo '{"Num":"' . ($i % 10 + 1) . '"}';
    echo "]";
}