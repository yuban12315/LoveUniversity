<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 15:49
 */
session_start();
if($_SESSION!=null)
{
    $getuser = $_SESSION['username'];

}