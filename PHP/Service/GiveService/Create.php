<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 18:39
 */
session_start();
require_once '../../DAO/DAO.php';
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
    $giveuser = $_SESSION['username'];
    if(empty($_POST['giveinformation'])&&empty($_FILES['']))
    {
        $giveinformation = $_POST['giveinformation'];

    }
}