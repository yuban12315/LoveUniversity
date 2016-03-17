<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 18:39
 */
session_start();
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];

}