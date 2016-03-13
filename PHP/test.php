<?php
/*
  $conn = mysqli_connect("183.175.12.160","root","31415926","loveu","3306");
//$str = date("Y-m-d h:m:s");
$str = '2016-01-03 16:55:55';
mysqli_query($conn,"insert into run (UserId,PostUser,RunInformation,RunTime,state) VALUES (1,'1','haha','{$str}',1)");
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
 二维码生成
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

