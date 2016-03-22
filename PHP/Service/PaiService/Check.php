<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/22
 * Time: 12:55
 */
require_once '../UserService/Check.php';
if($_SESSION['userid']) {
    check('pai');
}