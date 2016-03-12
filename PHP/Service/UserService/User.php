<?php
session_start();
require_once '../../DAO/DAO.php';

$id=$_GET['userid'];

$str = 'select * from user where UserId = "'.$username.'" and PassWord = "'.$password.'"';

