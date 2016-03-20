<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 15:49
 */
//约
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['userid'];
    $str = "select * from run where GetUser = {$getuser} and state = 1";
    $row = sel($str);
    if ($row && (strtotime(date("y-m-d h:i:s")) < strtotime($row['RunTime']))) {
        echo '已有约会';
    } else {
        $runid = (int)$_POST['runid'];
        $str = "update run set state = 0 where  RunId = {$runid}";
        up($str);
        $str = "update run set GetUser = '{$getuser}' where RunId = {$runid}";
        up($str);
        echo "1";
    }
}
