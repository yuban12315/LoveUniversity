<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/9
 * Time: 19:00
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $str = 'select * from user where UserId = "' . $userid . '"';
    /*
    $str1 = 'select * from food where UserId = "' . $userid . '"';
    $str2 = 'select * from run where UserId = "' . $userid . '"';
    $str3 = 'select * from pai where UserId = "' . $userid . '"';
    $str4 = 'select * from xue where UserId = "' . $userid . '"';
    */
    $PersonalData = sel($str);
    /*
    $FoodData = sel($str1);
    $RunData = sel($str2);
    $PaiData = sel($str3);
    $XueData = sel($str4);
    */
    unset($PersonalData['PassWord'], $PersonalData['JwxtPassword'], $PersonalData['SecretKey']);
    $array['PersonalData'] = $PersonalData;
    $str = 'select * from money where UserId = "' . $userid . '"';
    $row = sel($str);
    $sign = 0;
    if (empty($row['PayPassword'])) {
        $sign = 0;
    } else {
        $sign = 1;
    }
    $array['sign'] = $sign;
    /*
    if($FoodData!=null) {
        unset($FoodData['UserId']);
        $array['FoodData']=$FoodData;
    }
    if($RunData!=null) {
        unset($RunData['UserId']);
        $array['RunData'] = $RunData;
    }
    if($PaiData!=null) {
        unset($PaiData['UserId']);
        $array['PaiData'] = $PaiData;
    }
    if($XueData!=null) {
        unset($XueData['UserId']);
        $array['XueData'] = $XueData;
    }
    */
    $str = ch_json_encode($array);
    /*
    $str = str_replace("{","",$str);
    $str = str_replace("}","",$str);
    $str = str_replace("\"","",$str);*/
    echo $str;
}
?>

