<?php
session_start();
require_once '../../DAO/DAO.php';
require_once '../UserService/XSS.php';
/*调用测试
$_SESSION['userid'] = 33;
$_SESSION['userphoto'] = '111';
$_SESSION['jwxtnumber'] = '111';
*/
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $postimage = $_SESSION['userphoto'];
    if (!empty($_SESSION['jwxtnumber'])) {
        $str = "select * from xue where UserId = '{$userid}' and state = 1";
        $row = sel($str);
        if ($row) {
            echo "已有约会";
        } else {
            if (empty($_POST['xueinformation']) || empty($_POST['xuetime']) || empty($_POST['xuearea'])) {
                echo '信息不能为空';
            } else {
                $postuser = $_SESSION['username'];
                @$xueinformation = xss($_POST['xueinformation']);
                @$xuetime = $_POST['xuetime'];
                @$xuearea = xss($_POST['xuearea']);
                if (strtotime(date("y-m-d h:i:s")) >= strtotime($xuetime)) {
                    echo '请输入正确的时间';
                } else {
                    $str = "insert into xue (UserId,PostUser,XueArea,XueInformation,XueTime,state,PostImage) VALUES ('{$userid}','{$postuser}','{$xuearea}','{$xueinformation}','{$xuetime}',1,'{$postimage}')";
                    ins($str);
                    echo "1";
                }
            }
        }
    } else {
        echo '请完善个人信息';
    }
}
