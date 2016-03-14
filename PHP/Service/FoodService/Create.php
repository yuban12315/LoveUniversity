<?php
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if ($row['JwxtNumber']) {
        $str = "select * from food where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state']) {
                echo "已有约会";
            } else {
                $username = $_SESSION['username'];
                $str = "insert into food (UserId) VALUES ('{$userid}')";
                ins($str);
                @$foodinformation = $_POST['foodinformation'];
                @$foodtime = $_POST['foodtime'];
                @$foodarea = $_POST['foodarea'];
                $str = "update food set FoodTime = '{$foodtime}' where UserId = '{$userid}'";
                up($str);
                $str = "update food set FoodIformation = '{$foodinformation}' where UserId = '{$userid}'";
                up($str);
                $str = "update food set PostUser = '{$username}' where UserId = '{$userid}'";
                up($str);
                $str = "update food set FoodArea = '{$foodarea}' where UserId = '{$userid}'";
                up($str);
                $str = "update food set state = '1' where UserId = '{$userid}'";
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