<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/20
 * Time: 13:06
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
$_SESSION['userid'] = 1;
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
    $conn = connect();
    $str = "select * from class where UserId = '{$userid}'";
    $result = mysqli_query($conn,$str);
    $row = mysqli_fetch_assoc($result);
    $i = 1;
    $j = 1;
    while($row)
    {
        $array[$row['Day']][$row['Number']] = $row['Information'];
        $row = mysqli_fetch_assoc($result);
    }
    echo json_encode($array);
}