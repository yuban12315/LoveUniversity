<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/18
 * Time: 15:12
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str1 = "select * from user where UserId = {$userid}";
    $row1 = sel($str1);
    if (empty($row1['JwxtNumber'])) {
        echo '请完善个人信息';
        die();
    } else {
        if (empty($_POST['getinformation'])) {
            echo "信息不能为空";
        } else {
            $getinformation = $_POST['getinformation'];
            if (xss($getinformation)) {
                echo '不要试图攻击';
                die();
            }
            @$giveid = $_POST['giveid'];
            $str = "select * from give where GiveId = {$giveid}";
            $row = sel($str);
            if ($row['state'] == 1) {
                $userid = $_SESSION['userid'];
                $str = "insert into get (UserId,GetInformation,GiveId) VALUES ('{$userid}','{$getinformation}','{$giveid}')";
                ins($str);
                echo '1';
            }
            else{
                echo '你来晚了，ta已经被约了';
            }
        }
    }
}