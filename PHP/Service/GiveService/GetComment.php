<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/25
 * Time: 13:51
 */
require_once '../UserService/Comment.php';
@$page = (int)$_GET['page'];
comment('gets',$page,'GiveId',1,'GetId');