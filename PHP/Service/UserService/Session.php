<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 12:41
 */
session_start();
if ($_SESSION['userid'] != null) {
    echo $_SESSION['userid'];
} else {
    echo "";
}
if ($_SESSION['truename'] != null) {
    echo $_SESSION['truename'];
} else {
    echo "";
}