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
    $str = "select * from {$table} ";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    $i = 0;
    while ($i <= ($page * 10 - 1) && !empty($row)) {
        if ($row['state'] == 0 ) {
            $row = mysqli_fetch_assoc($result);
            continue;
        }

        unset($row['GetUser']);
        $i++;
        if ($i >= ($page - 1) * 10) {
            $array[$i-1] = $row;
        }
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