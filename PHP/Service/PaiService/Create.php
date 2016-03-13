<?php
session_start();
require_once '../UserService/ImageChange.php';
require_once '../UserService/Upload.php';
require_once '../../DAO/DAO.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $postuser = $_POST['username'];
    $paimoney = $_POST['paimoney'];
    $uptime = $_POST['uptime'];
    $downtime = $_POST['downtime'];
    $paiinformation = $_POST['paiinformation'];
    $name = $_FILES['paiimage']['name'];
    $type = $_FILES['paiimage']['type'];
    $tmp_name = $_FILES['paiimage']['tmp_name'];
    $error = $_FILES['paiimage']['error'];
    $size = $_FILES['paiimage']['size'];
    $destination = "../../UserImage/Pai" . "$name";
    $rename = $userid.'.png';
    $path = 'http://7xrqhs.com1.z0.glb.clouddn.com/'.$rename;
}