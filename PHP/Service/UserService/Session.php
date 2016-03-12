<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 12:41
 */
session_start();
require_once 'ch_json_encode.php';
if ($_SESSION['userid'] != null) {
    echo ch_json_encode($_SESSION);
}