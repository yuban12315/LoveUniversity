<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:29
 */
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
Mypage('run',null);
function Mypage($table,$page)
{
    $conn = connect();
    $str = "select * from {$table} ";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
    while($row)
    {
        echo ch_json_encode($row);
        $row = mysqli_fetch_assoc($result);
    }
}