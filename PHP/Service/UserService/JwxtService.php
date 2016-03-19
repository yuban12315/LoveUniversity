<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/19
 * Time: 19:41
 */
require_once '../../DAO/DAO.php';
classservice('0151122350','15248113901','1');
function loginservice($jwxtnumber,$jwxtpassword)
{
    $url = "http://183.175.14.250:8888/JwxtInterface/check.html?zjh={$jwxtnumber}&mm={$jwxtpassword}";
    if(file_get_contents($url)=='1')
        return true;
    else
        return false;
}
function classservice($jwxtnumber,$jwxtpassword,$userid)
{
    $url = "http://183.175.14.250:8888/JwxtInterface/course.html?zjh={$jwxtnumber}&mm={$jwxtpassword}";
    $html = file_get_contents($url);
    $array = json_decode($html);
    $i=0;
    while($i<=76)
    {
        $information = $array[$i]->courseInfo;
        $number = (int)$array[$i]->no;
        $day = (int)$array[$i]->day;
        $str = "insert into class (UserId,Day,Number,Information) VALUES ('{$userid}','{$day}','{$number}','{$information}')";
        ins($str);
        $i++;
    }
}
function inforservice($jwxtnumber,$jwxtpassword)
{
    $url = "http://183.175.14.250:8888/JwxtInterface/info.html?zjh={$jwxtnumber}";
    $html = file_get_contents($url);
    $array = json_decode($html);

}