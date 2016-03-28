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
/*测试创建Help
$_SESSION['userid'] = 25;
$_SESSION['jwxtnumber'] = '111';
$_SESSION['username'] = 'admin';
$_POST['helpmoney'] = 1;
$_POST['helpinformation'] = '111';
$_POST['paypassword'] = '123456789';
$_POST['time'] = '2016-07-08 16:18:00';
$_SESSION['userphoto'] = '111';
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
                @$time = $_POST['time'];
                @$helpmoney = (int)$_POST['helpmoney'];
                @$helpinformation = xss($_POST['helpinformation']);
                @$paypassword = $_POST['paypassword'];
                if (strtotime(date("y-m-d h:i:s")) >= strtotime($time)) {
                    echo '请输入正确的时间';
                } else {
                    $data = pay($userid, $helpmoney, 0, $paypassword);
                    if ($data == '1') {
                        $helpimage = $_SESSION['userphoto'];
                        $str = "insert into help (UserId,PostUser,HelpMoney,DownTime,HelpInformation,state,HelpImage,Finish) VALUES ({$userid},'{$postuser}',{$helpmoney},'{$time}','{$helpinformation}',1,'{$helpimage}',1)";
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
