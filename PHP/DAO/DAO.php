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
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'loveu', '3306');
    if ($conn) {
        return $conn;
    } else {
        echo 'error';
        die();
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
    if (mysqli_query($conn, $str)) {
        mysqli_close($conn);
        return true;
    } else {
        echo 'error';
        die();
    }
}

function up($str)
{
    $conn = connect();
    if (mysqli_query($conn, $str)) {
        mysqli_close($conn);
        return true;
    } else {
        echo 'error';
        die();
    }
}

function del($str)
{
    $conn = connect();
    mysqli_query($conn, $str);
    mysqli_close($conn);
}

?>