<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/13
 * Time: 12:51
 */
session_start();
if($_SESSION)
{
    $array = $_SESSION;
    unset($array['useridmd5']);
    echo json_encode($array);
}