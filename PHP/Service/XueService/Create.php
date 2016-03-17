<?php
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if ($row['JwxtNumber']) {
        $str = "select * from xue where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state']) {
                echo "已有约会";
            } else {
                $postuser = $_SESSION['username'];
                @$xueinformation = $_POST['xueinformation'];
                @$xuetime = $_POST['xuetime'];
                @$xuearea = $_POST['xuearea'];
                $str = "insert into xue (UserId,PostUser,XueArea,Xueinformation,XueTime,state) VALUES ('{$userid}','{$postuser}','{$xuearea}';'{$xueinformation}','{$xuetime}',1)";
                ins($str);
                echo "1";
            }
        }
        else{
            $postuser = $_SESSION['username'];
            @$xueinformation = $_POST['xueinformation'];
            @$xuetime = $_POST['xuetime'];
            @$xuearea = $_POST['xuearea'];
            $str = "insert into xue (UserId,PostUser,XueArea,Xueinformation,XueTime,state) VALUES ('{$userid}','{$postuser}','{$xuearea}';'{$xueinformation}','{$xuetime}',1)";
            ins($str);
            echo "1";
        }
    }
    else
    {
        echo '请完善个人信息';
    }
}
