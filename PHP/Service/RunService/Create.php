<?php
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
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
                    if (empty($_POST['runinformation']) || empty($_POST['runtime'])) {
                        echo '信息不能为空';
                    } else {
                        @$runinformation = $_POST['runinformation'];
                        @$runtime = $_POST['runtime'];
                        if (xss($runinformation) || xss($runtime)) {
                            echo '请不要试图攻击!!!';
                            die();
                        }
                        $postuser = $_SESSION['username'];
                        $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
                        ins($str);
                        echo '1';
                    }
                }
        } else {
            if (empty($_POST['runtime']) || empty($_POST['runinformation'])) {
                echo '信息不能为空';
            } else {
                @$runinformation = $_POST['runinformation'];
                @$runtime = $_POST['runtime'];
                if (xss($runinformation)) {
                    echo '请不要试图攻击!!!';
                    die();
                }
                $postuser = $_SESSION['username'];
                $str = "insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES ('{$userid}','{$postuser}','{$runinformation}','{$runtime}',1)";
                ins($str);
                echo "";
            }
        }
    } else {
        echo '请完善个人信息';
    }
}

