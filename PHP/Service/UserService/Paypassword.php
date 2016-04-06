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
    @$paypassword = xss($_POST['paypassword']);
    if (strlen($paypassword) != 6) {
        echo '支付密码应为6位纯数字';
    } else {
        $flag = 1;
        for ($i = 0; $i < strlen($paypassword); $i++) {
            if ($paypassword[$i] < '0' || $paypassword[$i] > '9') {
                $flag = 0;
                echo "支付密码应为6位纯数字";
                break;
            }
        }
        if ($flag == 1) {
            $str = "update money set PayPassword = '{$paypassword}' where UserId = {$userid}";
            up($str);
            echo '1';
        }
    }
}