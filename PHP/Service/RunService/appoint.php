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
    $str = "select * from run where UserId = '{$getuser}' and state = 1";
    $row = sel($str);
    $str1 = "select * from run where GetUser = {$getuser}";
    $row1 = sel($str);
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        if ($row || ($row1 && (strtotime(date("y-m-d h:i:s")) > strtotime($row1['RunTime'])))) {
            echo "已有约会";
        } else {
            if (strtotime(date("y-m-d h:i:s")) < strtotime($row1['RunTime'])) {
                echo '约会已过期';
            } else {
                $runid = (int)$_POST['runid'];
                $str = "select * from run where RunId = {$runid}";
                $row = sel($str);
                if ($row) {
                    if ($row['state'] == 1) {
                        $str = "update run set state = 0 where  RunId = {$runid}";
                        up($str);
                        $str = "update run set GetUser = '{$getuser}' where RunId = {$runid}";
                        up($str);
                        echo "1";
                    } else {
                        echo '你来晚了，TA已经被约了';
                    }
                } else {
                    echo '约会已被删除';
                }
            }
        }
    }
}
