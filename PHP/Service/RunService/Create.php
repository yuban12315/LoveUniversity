<?php
session_start();
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $str = "select * from user where UserId = '{$userid}'";
    $row = sel($str);
    if (isset($row['JwxtNumber'])) {
        $str = "select * from run where UserId = '{$userid}'";
        $row = sel($str);
        if ($row) {
            if ($row['state']) {
                echo "已有约会";
            } else {
                if($_POST['runinformation']&&$_POST['runtime']) {
                    @$runinformation = $_POST['runinformation'];
                    @$runtime = $_POST['runtime'];
                    $postuser = $_SESSION['username'];
                    $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
                    ins($str);
                   echo '1';
                }
                else{
                    echo '信息不能为空';
                }
            }
        } else {
            if($_POST['runtime']&&$_POST['runinformation']) {
                @$runinformation = $_POST['runinformation'];
                @$runtime = $_POST['runtime'];
                $postuser = $_SESSION['username'];
                $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
                ins($str);
                echo "1";
            }
            else{
                echo '信息不能为空';
            }
        }
    } else {
        echo '请完善个人信息';
    }
}

