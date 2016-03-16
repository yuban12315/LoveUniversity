<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/16
 * Time: 20:40
 */
session_start();
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
    $comment = $_POST['comment'];

}