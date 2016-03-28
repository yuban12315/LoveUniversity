<?php
//创建
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
/*
$_SESSION['userid'] = 25;
$_SESSION['username'] = 'admin';
$_SESSION['userphoto'] = "http://7xrqhs.com1.z0.glb.clouddn.com/3b442b1ed7b0194d292af7e601e6e84f.png";
$_SESSION['jwxtnumber'] = '0151122350';
$_POST['foodinformation'] = 'hahaha';
$_POST['foodtime'] = '2016-06-06 16:00:00';
$_POST['foodarea'] = 'hahaha';
$_POST['foodway'] = '55kai';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $postimage = $_SESSION['userphoto'];
    if (!empty($_SESSION['jwxtnumber'])) {
        $str = "select * from food where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            echo "已有约会";
        } else {
            if (empty($_POST['foodinformation']) || empty($_POST['foodtime']) || empty($_POST['foodarea']) || empty($_POST['foodway'])) {
                echo '信息不能为空';
            } else {
                $postuser = $_SESSION['username'];
                @$foodinformation = xss($_POST['foodinformation']);
                @$foodtime = $_POST['foodtime'];
                @$foodarea = xss($_POST['foodarea']);
                @$fooodway = xss($_POST['foodway']);
                if (strtotime(date("y-m-d h:i:s")) <= strtotime($foodtime)) {
                    echo '请输入正确的时间';
                } else {
                    $str = "insert into food (UserId,PostUser,FoodInformation,FoodTime,FoodArea,FoodWay,state,PostImage) VALUES ('{$userid}','{$postuser}','{$foodinformation}','{$foodtime}','{$foodarea}','{$fooodway}',1,'{$postimage}')";
                    ins($str);
                    echo "1";
                }
            }
        }
    } else {
        echo '请完善个人信息';
    }
}