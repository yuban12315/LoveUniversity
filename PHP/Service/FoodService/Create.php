<?php
//创建
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if (isset($row['JwxtNumber'])) {
        $str = "select * from food where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state'] == 1) {
                echo "已有约会";
            } else {
                if (empty($_POST['foodinformation']) || empty($_POST['foodtime']) || empty($_POST['foodarea']) || empty($_POST['foodway'])) {
                    echo '信息不能为空';
                } else {
                    $postuser = $_SESSION['username'];
                    @$foodinformation = $_POST['foodinformation'];
                    @$foodtime = $_POST['foodtime'];
                    @$foodarea = $_POST['foodarea'];
                    @$fooodway = $_POST['foodway'];
                    if (xss($foodinformation) || xss($foodtime) || xss($fooodway) || xss($foodarea)) {
                        echo '不要试图攻击';
                        die();
                    }
                    $str = "insert into food (UserId,PostUser,FoodInformation,FoodTime,FoodArea,FoodWay,state) VALUES ('{$userid}','{$postuser}','{$foodinformation}','{$foodtime}','{$foodarea}','{$fooodway}',1)";
                    ins($str);
                    echo "1";
                }
            }
        } else {
            if (empty($_POST['foodinformation']) || empty($_POST['foodtime']) || empty($_POST['foodarea']) || empty($_POST['foodway'])) {
                echo '信息不能为空';
            } else {
                $postuser = $_SESSION['username'];
                @$foodinformation = $_POST['foodinformation'];
                @$foodtime = $_POST['foodtime'];
                @$foodarea = $_POST['foodarea'];
                @$fooodway = $_POST['foodway'];
                if (xss($foodinformation) || xss($foodtime) || xss($fooodway) || xss($foodarea)) {
                    echo '不要试图攻击';
                    die();
                }
                $str = "insert into food (UserId,PostUser,FoodInformation,FoodTime,FoodArea,FoodWay,state) VALUES ('{$userid}','{$postuser}','{$foodinformation}','{$foodtime}','{$foodarea}','{$fooodway}',1)";
                ins($str);
                echo "1";
            }
        }
    } else {
        echo '请完善个人信息';
    }
}