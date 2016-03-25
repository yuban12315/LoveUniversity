<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/10
 * Time: 21:26
 */
require_once "../../php-sdk-master/autoload.php";
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
function upload($path,$name,$space)
{
    $accessKey = 'gFO-8IYwjVPzNAmbAORHJCgGwIHzcyIbFhZ3yVIi';
    $secretKey = 'hllClWcBETkcn0aI8SROEe4Y1blV5gEQwgUHAQQu';
    $auth = new Auth($accessKey, $secretKey);
// 要上传的空间
    $bucket = $space;

// 生成上传 Token
    $token = $auth->uploadToken($bucket);

// 要上传文件的本地路径
    $filePath = $path;

// 上传到七牛后保存的文件名
    $key = $name;

// 初始化 UploadManager 对象并进行文件的上传
    $uploadMgr = new UploadManager();

// 调用 UploadManager 的 putFile 方法进行文件的上传
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
    if ($err !== null) {
        var_dump($err);
    } else {
        var_dump($ret);
    }
}
