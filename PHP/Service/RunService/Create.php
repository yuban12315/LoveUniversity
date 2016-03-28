<?php
//创建
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
/*
$_SESSION['userid'] = 27;
$_SESSION['username'] = 'misakamikoto';
$_SESSION['userphoto']="...";
$_POST['runinformation']= '111';
$_POST['runtime'] = '2017-01-08 16:16:16';
$_POST['runarea'] = '111';
$_SESSION['jwxtnumber'] = '0151122350';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $postimage = $_SESSION['userphoto'];
    if (!empty($_SESSION['jwxtnumber'])) {
        $str = "select * from run where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            echo "已有约会";
        } else {
            if (empty($_POST['runinformation']) || empty($_POST['runtime'])) {
                echo '信息不能为空';
            } else {
                @$runinformation = xss($_POST['runinformation']);
                @$runtime = $_POST['runtime'];
                @$runarea = xss($_POST['runarea']);
                if (strtotime(date("y-m-d h:i:s")) <= strtotime($runtime)) {
                    echo '请输入正确的时间';
                } else {
                    $postuser = $_SESSION['username'];
                    $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state,PostImage,RunArea) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1,'{$postimage}','{$runarea}')";
                    ins($str);
                    echo '1';
                }
            }
        }
    } else {
        echo '请完善个人信息';
    }
}

