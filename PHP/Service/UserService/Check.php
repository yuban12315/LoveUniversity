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
        $str = "select * from {$table} where GetUser = {$getuser}";
        $row = sel($str);
        echo ch_json_encode($row);
    }
}