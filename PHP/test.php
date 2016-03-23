<?php

 /* $conn = mysqli_connect("183.175.12.160","root","31415926","loveu","3306");
//$str = date("Y-m-d h:m:s");
//$str = '2016-01-03 16:55:55';
mysqli_query($conn,"select * from user where UserId = 1");
*/
/*
 * 七牛云存储
require_once "php-sdk-master/autoload.php";
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
upload();
function upload()
{
    $accessKey = 'gFO-8IYwjVPzNAmbAORHJCgGwIHzcyIbFhZ3yVIi';
    $secretKey = 'hllClWcBETkcn0aI8SROEe4Y1blV5gEQwgUHAQQu';
    $auth = new Auth($accessKey, $secretKey);
// 要上传的空间
    $bucket = 'loveu';

// 生成上传 Token
    $token = $auth->uploadToken($bucket);

// 要上传文件的本地路径
    $filePath = "UserImage/System/Head.jpg";

// 上传到七牛后保存的文件名
    $key = "Head.png";

// 初始化 UploadManager 对象并进行文件的上传
    $uploadMgr = new UploadManager();

// 调用 UploadManager 的 putFile 方法进行文件的上传
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
    echo "\n====> putFile result: \n";
    if ($err !== null) {
        var_dump($err);
    } else {
        var_dump($ret);
    }
}*/
//unlink('UserImage/System/Head.jpg');
/*
 *
 二维码生成23
include 'phpqrcode/phpqrcode.php';
$value = 'https://www.hao123.com/'; //二维码内容
$errorCorrectionLevel = 'L';//容错级别
$matrixPointSize = 6;//生成图片大小
//生成二维码图片
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
$logo = 'UserImage/System/Head.jpg';//准备好的logo图片
$QR = 'qrcode.png';//已经生成的原始二维码图

if ($logo !== FALSE) {
  $QR = imagecreatefromstring(file_get_contents($QR));
  $logo = imagecreatefromstring(file_get_contents($logo));
  $QR_width = imagesx($QR);//二维码图片宽度
  $QR_height = imagesy($QR);//二维码图片高度
  $logo_width = imagesx($logo);//logo图片宽度
  $logo_height = imagesy($logo);//logo图片高度
  $logo_qr_width = $QR_width / 5;
  $scale = $logo_width/$logo_qr_width;
  $logo_qr_height = $logo_height/$scale;
  $from_width = ($QR_width - $logo_qr_width) / 2;
  //重新组合图片并调整大小
  imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
      $logo_qr_height, $logo_width, $logo_height);
}
//输出图片
imagepng($QR, 'helloweba.png');
echo '<img src="helloweba.png">';

*/
//@$img=$_GET['img'];//GET 图片地址
/*
change('UserImage/System/Head.jpg',1000,1000);
function change($url, $newwidth, $newheight)
{
    $img = $url;
    $size = getimagesize($img);
    $src_w = $size[0];
    $src_h = $size[1];
    $w = $newwidth;
    $h = $newheight;
    $h2 = $src_h * ($w / $src_w);
    $w2 = $src_w * ($h / $src_h);
    if ($h2 < $h) $h = $h2;
    if ($w2 < $w) $w = $w2;
    $new_image = imagecreatetruecolor($w, $h);
    if ($size[2] == 1) {
        $src_image = imagecreatefromgif($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } elseif ($size[2] == 2) {
        $src_image = imagecreatefromjpeg($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } else {
        $src_image = imagecreatefrompng($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    }
    unlink($url);
    imagejpeg($new_image,$url);
    imagedestroy($new_image);
    imagedestroy($src_image);
}
*/
/*
unlink("http://7xrqhs.com1.z0.glb.clouddn.com/1.jpg");
function change($url, $newwidth, $newheight)
{
    $img = $url;
    $size = getimagesize($img);
    $src_w = $size[0];
    $src_h = $size[1];
    $w = $newwidth;
    $h = $newheight;
    $h2 = $src_h * ($w / $src_w);
    $w2 = $src_w * ($h / $src_h);
    if ($h2 < $h) $h = $h2;
    if ($w2 < $w) $w = $w2;
    $new_image = imagecreatetruecolor($w, $h);
    if ($size[2] == 1) {
        $src_image = imagecreatefromgif($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } elseif ($size[2] == 2) {
        $src_image = imagecreatefromjpeg($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    } else {
        $src_image = imagecreatefrompng($img);
        imagecopyresampled($new_image, $src_image, 0, 0, 0, 0, $w, $h, $src_w, $src_h);
    }
    unlink($url);
    imagejpeg($new_image,$url);
    imagedestroy($new_image);
    imagedestroy($src_image);
}
*/
/*
require_once 'DAO/DAO.php';
$_POST['user']=" ";
echo isset($_POST['user']);
echo empty($_POST['user']);
*/
//echo date("y-m-d h:m:s");
//echo md5(uniqid(microtime(true), true));
/*
require_once 'DAO/DAO.php';
$userid = 27;
$str = "select * from user where UserId = {$userid}";
echo sel($str)['UserName'];
*/
/*
$url='http://183.175.14.250:8888/JwxtCourseWeb/?zjh=0151122350&mm=15248113901';
$html = file_get_contents($url);
$array =  json_decode($html);
$c1 = (string)$array[0]->courseInfo;
echo $c1;*/
//echo floor(8/10);
//require_once 'DAO/DAO.php';
/*
$_SESSION['userid'] = 27;
$_SESSION['username'] = 'admin';
$_POST['xueinformation'] =  "11111";
$_POST['xuetime'] = "2016-06-01 12:12:12";
$_POST['xuearea'] = "11";
$postuser = $_SESSION['username'];
@$xueinformation = $_POST['xueinformation'];
@$xuetime = $_POST['xuetime'];
@$xuearea = $_POST['xuearea'];
$postimage = "111";
$userid = $_SESSION['userid'];
*/
@$str = $_POST['test'];
echo $str;
strtr($str,'/n',"");
echo $str;
/*
$conn = mysqli_connect('183.175.12.160', 'root', '31415926', 'loveu', '3306');
$str = "select count(*) from run where state = 1";
$result = mysqli_query($conn, $str);
$row = mysqli_fetch_assoc($result);
echo $row['count(*)'];
*/




