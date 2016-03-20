<?php
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $postimage = $_SESSION['UserPhoto'];
    if (!empty($row['JwxtNumber'])) {
        $str = "select * from xue where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state']) {
                echo "已有约会";
            } else {
                if (empty($_POST['xueinformation']) || empty($_POST['xuetime']) || empty($_POST['xuearea'])) {
                    echo '信息不能为空';
                } else {
                    $postuser = $_SESSION['username'];
                    @$xueinformation = $_POST['xueinformation'];
                    @$xuetime = $_POST['xuetime'];
                    @$xuearea = $_POST['xuearea'];
                    if (xss($xueinformation) || xss($xuearea) || xss($xuetime)) {
                        echo '不要试图攻击';
                        die();
                    }
                    $str = "insert into xue (UserId,PostUser,XueArea,XueInformation,XueTime,state,PostImage) VALUES ('{$userid}','{$postuser}','{$xuearea}','{$xueinformation}','{$xuetime}',1,'{$postimage}')";
                    ins($str);
                    echo "1";
                }
            }
        } else {
            if (empty($_POST['xueinformation']) || empty($_POST['xuetime']) || empty($_POST['xuearea'])) {
                echo '信息不能为空';
            } else {
                $postuser = $_SESSION['username'];
                @$xueinformation = $_POST['xueinformation'];
                @$xuetime = $_POST['xuetime'];
                @$xuearea = $_POST['xuearea'];
                if (xss($xueinformation) || xss($xuearea) || xss($xuetime)) {
                    echo '不要试图攻击';
                    die();
                }
                $str = "insert into xue (UserId,PostUser,XueArea,XueInformation,XueTime,state,PostImage) VALUES ('{$userid}','{$postuser}','{$xuearea}','{$xueinformation}','{$xuetime}',1,'{$postimage}')";
                ins($str);
                echo "1";
            }
        }
    } else {
        echo '请完善个人信息';
    }
}
