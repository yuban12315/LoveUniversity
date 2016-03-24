<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/22
 * Time: 12:46
 */
session_start();
require_once '../../DAO/DAO.php';
require_once 'ch_json_encode.php';
/*调用测试
$_GET['table'] = 'pai';
$_SESSION['userid'] = 25;
*/
@$table = $_GET['table'];
$ID = '';
switch($table)
{
    case 'xue': $ID = 'XueId';break;
    case 'run': $ID = 'RunId';break;
    case 'food': $ID = 'FoodId';break;
    case 'give': $ID = 'GiveId';break;
    case 'help': $ID = 'HelpId';break;
    case 'pai': $ID = 'PaiId';break;
}
check($table,$ID);
function check($table,$ID)
{
    if (isset($_SESSION['userid'])) {
        $getuser = $_SESSION['userid'];
        $array1 = null;
        $array2 = null;
        $conn = connect();
        $str = "select * from {$table} where GetUser = {$getuser} order by {$ID} desc";
        $result = mysqli_query($conn,$str);
        $row = mysqli_fetch_assoc($result);
        $i = 0;
        while($row)
        {
            $array1[$i] = $row;
            $i++;
            $row = mysqli_fetch_assoc($result);
        }
        $conn = connect();
        $str = "select * from {$table} where UserId = {$getuser} order by {$ID} desc";
        $result = mysqli_query($conn,$str);
        $row = mysqli_fetch_assoc($result);
        $i = 0;
        while($row)
        {
            $array2[$i] = $row;
            $i++;
            $row = mysqli_fetch_assoc($result);
        }
        $array['get'] = $array1;
        $array['post'] = $array2;
        echo ch_json_encode($array);
    }
}