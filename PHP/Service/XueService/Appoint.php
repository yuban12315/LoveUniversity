<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:50
 */
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $getuser = $_SESSION['userid'];
    $str = "select * from xue where UserId = '{$getuser}' and state = 1";
    $row = sel($str);
    $str1 = "select * from xue where GetUser = {$getuser}";
    $row1 = sel($str1);
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        if ($row || ($row1 && (strtotime(date("y-m-d h:i:s")) > strtotime($row1['XueTime'])))) {
            echo "已有约会";
        } else {
            if (strtotime(date("y-m-d h:i:s")) < strtotime($row1['XueTime'])) {
                echo '约会已过期';
            } else {
                $xueid = (int)$_POST['xueid'];
                $str = "select * from xue where XueId = {$xueid}";
                $row = sel($str);
                if ($row) {
                    if ($row['state'] == 1) {
                        $str = "update xue set state = 0 where XueId = {$xueid}";
                        up($str);
                        $str = "update xue set GetUser = '{$getuser}' where XueId = {$xueid}}";
                        up($str);
                        echo "1";
                    } else {
                        echo '你来晚了，ta已经被约了';
                    }
                } else {
                    echo '约会已被删除';
                }
            }
        }
    }
}