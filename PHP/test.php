<?php
/*
 * $conn = mysqli_connect("183.175.12.160","root","31415926","loveu","3306");
 * $username = "123";
 * $result = mysqli_query($conn,"select * from user where UserName = 'admin'");
 * $row = mysqli_fetch_assoc($result);
 * echo $row['PassWord'];
 */
/*
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
echo "hahah";




