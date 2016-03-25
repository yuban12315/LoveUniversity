<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/20
 * Time: 16:28
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
require_once '../Payment/Pay.php';
/*
$_SESSION['userid'] = 25;
$_SESSION['jwxtnumber'] = '111';
$_POST['']
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
            $postuser = $_SESSION['username'];
            if (empty($_POST['helpmoney']) || empty($_POST['helpinformation'])) {
                echo "信息不能为空";
            } else {
                @$helpmoney = (int)$_POST['helpmoney'];
                @$helpinformation = $_POST['helpinformation'];
                @$paypassword = $_POST['paypassword'];
                if (xss($helpmoney) || xss($helpinformation)) {
                    echo "不要试图攻击";
                } else {
                    $data = pay($userid, $helpmoney, 0, $paypassword);
                    if ($data == '1') {
                        $uptime = date("y-m-d h:m:s");
                        $helpimage = $_SESSION['userphoto'];
                        $str = "insert into help (UserId,PostUser,HelpMoney,UpTime,HelpInformation,state,HelpImage) VALUES ({$userid},'{$postuser}',{$helpmoney},'{$uptime}','{$helpinformation}',1,'{$helpimage}')";
                        ins($str);
                        echo '1';
                    } else {
                        echo $data;
                    }
                }
            }
        }
    }
}
