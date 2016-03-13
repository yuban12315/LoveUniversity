<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/8
 * Time: 20:09
 */
require_once 'DAOConfig.php';
function connect()
{
    $conn = mysqli_connect('183.175.12.160', 'root', '31415926', 'loveu', '3306');
    if ($conn) {
        return $conn;
    } else {
        return false;
    }
}

function sel($str)
{
    $conn = connect();
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row;
}

function ins($str)
{
    $conn = connect();
    mysqli_query($conn, $str);
    mysqli_close($conn);
}

function up($str)
{
    $conn = connect();
    if (mysqli_query($conn, $str)) {
        mysqli_close($conn);
        return true;
    } else {
        return false;
    }
}

function del($str)
{
    $conn = connect();

    if (mysqli_query($conn, $str)) {
        mysqli_close($conn);
        return true;
    } else {
        return false;
    }

}

?>