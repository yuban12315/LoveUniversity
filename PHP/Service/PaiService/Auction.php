<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/14
 * Time: 13:51
 */
if(isset($_SESSION['userid'])) {
    require_once '../../DAO/DAO.php';
    $userid = $_SESSION['userid'];
    @$paimoney = $_POST['paimoney'];
    $paiid = "";
    $str = "select * from pai where PaiId = '{$paiid}'";

}
