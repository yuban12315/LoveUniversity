<?php
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if ($row['JwxtNumber']) {
        $str = "select * from run where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state']) {
                echo "已有约会";
            } else {
                @$runinformation = $_POST['runinformation'];
                @$runtime = $_POST['runtime'];
                $postuser = $_SESSION['username'];
                $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
                ins($str);
                echo "1";
            }
        } else {
            @$runinformation = $_POST['runinformation'];
            @$runtime = $_POST['runtime'];
            $postuser = $_SESSION['username'];
            $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
            ins($str);
            echo "1";
        }
    } else {
        echo '请完善个人信息';
    }
}

