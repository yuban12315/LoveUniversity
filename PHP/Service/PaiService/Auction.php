<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:51
 */
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
require_once '../Payment/Pay.php';
require_once '../Payment/Get.php';
/*拍卖测试
$_SESSION['userid'] =35;
$_SESSION['jwxtnumber'] = '111';
$_POST['paimoney'] = 17;
$_POST['paiid'] = 1;
$_POST['paypassword'] = '123456789';
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
            @$paimoney = (int)$_POST['paimoney'];
            if (xss($paimoney)) {
                echo '不要试图攻击';
                die();
            }
            $paiid = (int)$_POST['paiid'];
            $str = "select * from pai where PaiId = {$paiid}";
            $row = sel($str);
            if ($paimoney <= $row['PaiMoney']) {
                echo '竞拍价格必须高于当前价格';
            } else {
                if (strtotime(date("y-m-d h:i:s")) > strtotime($row['DownTime'])) {
                    echo '竞拍已结束';
                } else {
                    $data = pay($userid, $paimoney, $row['UserId'], $_POST['paypassword']);
                    if ($data == '1') {
                        if (!(empty($_POST['comment']))) {
                            @$comment = $_POST['comment'];
                            if (xss($comment)) {
                                echo '不要试图攻击';
                                die();
                            }
                            $str = "insert into comment (UserId,Comment,PaiId) VALUES ({$userid},'{$comment}',{$paiid})";
                            ins($str);
                        }
                        $str = "select * from pai where PaiId = {$paiid}";
                        $row = sel($str);
                        if(!empty($row['GetUser'])) {
                            get(0, $row['PaiMoney'], $row['GetUser']);
                        }
                        $str = "update pai set PaiMoney = {$paimoney} where PaiId = {$paiid}";
                        up($str);
                        $str = "update pai set GetUser = {$getuser} where PaiId = {$paiid}";
                        up($str);
                        /*迷之代码
                        $str = "select * from pai where PaiId = {$paiid}";
                        $row = sel($str);
                        */
                        echo '1';
                    } else {
                        echo $data;
                    }
                }
            }
        }
    }
}
