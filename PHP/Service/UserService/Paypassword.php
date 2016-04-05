<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/4/5
 * Time: 12:46
 */
session_start();
require_once '../../DAO/DAO.php';
/*完善支付密码调用测试
$_SESSION['userid'] = 37;
$_POST['paypassword'] = '88888888';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    @$paypassword = $_POST['paypassword'];
    if (strlen($paypassword) < 8 || strlen($paypassword) > 17) {
        echo '密码应为8到16位';
    } else {
        $str = "update money set PayPassword = '{$paypassword}' where UserId = {$userid}";
        up($str);
        echo '1';
    }
}