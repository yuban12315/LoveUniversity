<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 17:11
 */
session_start();
require_once '../../DAO/DAO.php';
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $id = (int)$_POST['id'];
    $idname = $_POST['idname'];
    $str = "update xue set state  = 1 where {$idname} = '{$xueid}' and UserId = {$userid}";
    up($str);
    $str = "update xue set GetUser  = null where {$idname} = '{$xueid}' and UserId = {$userid}";
    up($str);
    echo '1';
}