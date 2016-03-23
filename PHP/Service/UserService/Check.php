<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/22
 * Time: 12:46
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
function check($table)
{
    if (isset($_SESSION['userid'])) {
        $getuser = $_SESSION['userid'];
        $array1 = null;
        $array2 = null;
        $conn = connect();
        $str = "select * from {$table} where GetUser = {$getuser}";
        $result = mysqli_query($conn,$str);
        $row = mysqli_fetch_assoc($result);
        $i = 0;
        while($row)
        {
            $array1[$i] = $row;
            $i++;
            $row = mysqli_fetch_assoc($result);
        }
        $conn = connect();
        $str = "select * from {$table} where UserId = {$getuser}";
        $result = mysqli_query($conn,$str);
        $row = mysqli_fetch_assoc($result);
        $i = 0;
        while($row)
        {
            $array2[$i] = $row;
            $i++;
            $row = mysqli_fetch_assoc($result);
        }
        $array['get'] = $array1;
        $array['post'] = $array2;
        echo ch_json_encode($array);
    }
}