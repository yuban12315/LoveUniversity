<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/22
 * Time: 14:47
 */
session_start();
require_once '../UserService/XSS.php';
require_once '../../DAO/DAO.php';
/*帮助调用测试
$_SESSION['userid'] = 27;
$_SESSION['jwxtnumber'] = '111';
$_POST['helpid'] = 1;
$_POST['comment'] = '111';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    if (empty($_SESSION['jwxtnumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        $str1 = "select * from money where UserId = {$userid}";
        $row1 = sel($str1);
        if (empty($row1['PayPassword'])) {
            echo "请完善钱包信息";
        } else {
            $getuser = $_SESSION['userid'];
            @$helpid = $_POST['helpid'];
            @$comment = $_POST['comment'];
            $str = "select * from help where HelpId = {$helpid}";
            $row = sel($str);
            if ($row) {
                if ($row['state'] == 1) {
                    if(strtotime(date("y-m-d h:i:s")) > strtotime($row['DownTime'])){
                        echo '该信息已过期';
                    }
                    else {
                        $str = "update help set GetUser = {$getuser} where HelpId = {$helpid}";
                        up($str);
                        $str = "update help set state = 0 where HelpId = {$helpid}";
                        up($str);
                        echo '1';
                    }
                } else {
                    echo '你来晚了，已经有人帮助他了';
                }
            } else {
                echo '该信息已被删除';
            }
        }
    }
}