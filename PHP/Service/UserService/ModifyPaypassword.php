<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/4/5
 * Time: 12:54
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'XSS.php';
/*修改支付密码调用测试
$_SESSION['userid'] = 37;
$_POST['oldpaypassword'] = '88888888';
$_POST['newpaypassword'] = '77777777';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    @$oldpaypassword = $_POST['oldpaypassword'];
    $str = "select * from money where UserId = {$userid} and PayPassword = '{$oldpaypassword}'";
    $row = sel($str);
    if($row) {
        @$newpaypassword = xss($_POST['newpaypassword']);
        if (strlen($newpaypassword) < 8 || strlen($newpaypassword) > 17) {
            echo '密码应为8到16位';
        } else {
            $str = "update money set PayPassword = '{$newpaypassword}' where UserId = {$userid}";
            up($str);
            echo '1';
        }
    }
    else{
        echo '密码错误';
    }
}