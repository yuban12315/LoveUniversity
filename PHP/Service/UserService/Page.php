<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:29
 */
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
function Mypage($table,$page,$time,$ID)
{
    $conn = connect();
    $str = "select * from {$table} ";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
    $i=0;
    while($i<=($page*10-1)&&$row) {

        if(strtotime(date("y-m-d h:i:s"))>=strtotime($row[$time]))
        {
            $id = $row[$ID];
            echo $id;
            $str = "update {$table} set state = 0 where {$ID} = '{$id}'";
            up($str);
        }

        if($row['state']==0||strtotime(date("y-m-d h:i:s"))>=strtotime($row[$time]))
        {
            $row = mysqli_fetch_assoc($result);
            continue;
        }
        $i++;

        if($i>=($page-1)*10) {
            echo ch_json_encode($row) . '<br>';
        }
        $row = mysqli_fetch_assoc($result);
    }
}