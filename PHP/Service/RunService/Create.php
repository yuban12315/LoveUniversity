<?php
session_start();
require_once '../../DAO/DAO.php';
if ($_SESSION == null) {
    echo "请登录";
}
else {
    $userid = $_SESSION['userid'];
    $str = "select * from run where UserId = '{$userid}'";
    if (sel($str)) {
        echo "已有约会";
    } else {
        $str = "insert into run (UserId) VALUES ('{$userid}')";
        ins($str);
        $runinformation = $_POST['runinformation'];
        $runtime = $_POST['runtime'];
        $str = "update run set RunTime = '{$runtime}' where UserId = '{$userid}'";
        up($str);
        $str = "update run set RunIformation = '{$runinformation}' where UserId = '{$userid}'";
        up($str);
        echo "创建成功";
    }
}

