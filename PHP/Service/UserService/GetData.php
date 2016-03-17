<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/17
 * Time: 13:42
 */
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
if(isset($_GET['userid'])||isset($_GET['username'])||isset($_GET['userphone']))
{
    if(isset($_GET['userid'])) {
        $key = $_GET['userid'];
        $O = 'UserId';
    }
    if(isset($_GET['username'])){
        $key = $_GET['username'];
        $O = 'UserName';
    }
    if(isset($_GET['userphone'])){
        $key = $_GET['userphone'];
        $O = 'UserPhone';
    }
    $str = "select * from user where {$O} = '{$key}'";
    $row = sel($str);
    echo ch_json_encode($row);
}