<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/19
 * Time: 19:41
 */
require_once '../../DAO/DAO.php';
function loginservice($jwxtnumber, $jwxtpassword)
{
    $url = "http://csb.hupeng.wang:8080/JwxtInterface/check.html?zjh={$jwxtnumber}&mm={$jwxtpassword}";
    if (file_get_contents($url) == '1')
        return true;
    else
        return false;
}
function classservice($jwxtnumber, $jwxtpassword, $userid)
{
    $str = "select * from class where UserId = {$userid}";
    $row = sel($str);
    if ($row) {
        $str = "delete from class where UserId = {$userid}";
        del($str);
    }
    $url = "http://csb.hupeng.wang:8080/JwxtInterface/course.html?zjh={$jwxtnumber}&mm={$jwxtpassword}";
    $html = file_get_contents($url);
    $array = json_decode($html);
    $i = 0;
    while ($i <= 76) {
        $information = $array[$i]->courseInfo;
        $number = (int)$array[$i]->no;
        $day = (int)$array[$i]->day;
        $str = "insert into class (UserId,Day,Number,Information) VALUES ('{$userid}','{$day}','{$number}','{$information}')";
        ins($str);
        $i++;
    }
}

function inforservice($jwxtnumber, $userid)
{
    $url = "http://csb.hupeng.wang:8080/JwxtInterface/info.html?zjh={$jwxtnumber}";
    $html = file_get_contents($url);
    $array = json_decode($html);
    $truename = $array->name;
    $usersex = $array->sex;
    if ($usersex == '男') {
        $usersex = 1;
    } else {
        $usersex = 0;
    }
    $usergrade = $array->className;
    $usermajor = $array->profession;
    $str = "update user set TrueName = '{$truename}' where UserId = {$userid}";
    up($str);
    $str = "update user set UserSex = '{$usersex}' where UserId = {$userid}";
    up($str);
    $str = "update user set UserGrade = '{$usergrade}' where UserId = {$userid}";
    up($str);
    $str = "update user set UserMajor = '{$usermajor}' where UserId = {$userid}";
    up($str);
}