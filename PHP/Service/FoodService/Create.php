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
            if ($row['state'] == 1) {
                echo "已有约会";
            } else {
                $postuser = $_SESSION['username'];
                @$foodinformation = $_POST['foodinformation'];
                @$foodtime = $_POST['foodtime'];
                @$foodarea = $_POST['foodarea'];
                @$fooodway = $_POST['foodway'];
                $str = "insert into food (UserId,PostUser,FoodInformation,FoodTime,FoodArea,FoodWay,state) VALUES ('{$userid}','{$postuser}','{$foodinformation}','{$foodtime}','{$foodarea}','{$fooodway}',1)";
                ins($str);
                echo "1";
            }
        }
        else{
            $postuser = $_SESSION['username'];
            @$foodinformation = $_POST['foodinformation'];
            @$foodtime = $_POST['foodtime'];
            @$foodarea = $_POST['foodarea'];
            @$fooodway = $_POST['foodway'];
            $str = "insert into food (UserId,PostUser,FoodInformation,FoodTime,FoodArea,FoodWay,state) VALUES ('{$userid}','{$postuser}','{$foodinformation}','{$foodtime}','{$foodarea}','{$fooodway}',1)";
            ins($str);
            echo "1";
        }
    } else {
        echo '请完善个人信息';
    }
}