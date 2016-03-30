<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/18
 * Time: 15:51
 */
require_once '../UserService/ch_json_encode.php';
require_once '../../DAO/DAO.php';
$table = 'give';
@$page = (int)$_GET['page'];
Mypage($table,$page);
function Mypage($table, $page)
{
    $conn = connect();
    $start = ($page - 1) * 10;
    $end = ($page * 10 - 2);
    $str = "select * from {$table} where state = 1 limit {$start},{$end} ";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    $i = 0;
    while (!empty($row)) {
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