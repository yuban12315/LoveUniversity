<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:29
 */
require_once '../../DAO/DAO.php';
//Mypage('run',1);
function Mypage($table,$page)
{
    $conn = connect();
    $str = "select * from {$table} ";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
    $i=($page-1)*10;
    while($i<=($page*10-1)) {
        $i++;
        echo json_encode($row).'<br>';
        $row = mysqli_fetch_assoc($result);
        if(!$row) {
            break;
        }
    }
}