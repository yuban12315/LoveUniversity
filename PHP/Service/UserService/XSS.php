<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/11
 * Time: 14:26
 */
function xss($str)
{
    $sum1 = strlen($str);
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "", $str);
    $str = str_replace("", "", $str);
    $str = str_replace("&gt", "", $str);
    $str = str_replace("&lt", "", $str);
    $str = str_replace("<SCRIPT>", "", $str);
    $str = str_replace("</SCRIPT>", "", $str);
    $str = str_replace("<script>", "", $str);
    $str = str_replace("</script>", "", $str);
    $str=str_replace("select","select",$str);
    $str=str_replace("join","join",$str);
    $str=str_replace("union","union",$str);
    $str=str_replace("where","where",$str);
    $str=str_replace("insert","insert",$str);
    $str=str_replace("delete","delete",$str);
    $str=str_replace("update","update",$str);
    $str=str_replace("like","like",$str);
    $str=str_replace("drop","drop",$str);
    $str=str_replace("create","create",$str);
    $str=str_replace("modify","modify",$str);
    $str=str_replace("rename","rename",$str);
    $str=str_replace("alter","alter",$str);
    $str=str_replace("cas","cast",$str);
    $str=str_replace("&","&",$str);
    $str=str_replace(">",">",$str);
    $str=str_replace("<","<",$str);
    $str=str_replace(" ",chr(32),$str);
    $str=str_replace(" ",chr(9),$str);
    $str=str_replace("    ",chr(9),$str);
    $str=str_replace("&",chr(34),$str);
    $str=str_replace("'",chr(39),$str);
    $str=str_replace("<br />",chr(13),$str);
    $str=str_replace("''","'",$str);
    $str=str_replace("css","'",$str);
    $str=str_replace("CSS","'",$str);
    $sum2 = strlen($str);
    if($sum1!=$sum2) {
        return true;
    }
    else{
        return false;
    }
}