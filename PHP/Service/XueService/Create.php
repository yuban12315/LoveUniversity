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
                $username = $_SESSION['username'];
                $str = "insert into xue (UserId) VALUES ('{$userid}')";
                ins($str);
                $xueinformation = $_POST['xueinformation'];
                $xuetime = $_POST['xuetime'];
                $str = "update xue set XueTime = '{$xuetime}' where UserId = '{$userid}'";
                up($str);
                $str = "update xue set XueIformation = '{$xueinformation}' where UserId = '{$userid}'";
                up($str);
                $str = "update xue set PostUser = '{$username}' where UserId = '{$userid}'";
                up($str);
                $str = "update xue set state = '1' where UserId = '{$userid}'";
                up($str);
                echo "创建成功";
            }
        }
    }
    else
    {
        echo '请完善个人信息';
    }
}
