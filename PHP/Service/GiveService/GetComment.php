<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/25
 * Time: 13:51
 */
require_once '../UserService/Comment.php';
@$page = (int)$_GET['page'];
@$giveid = (int)$_GET['giveid'];
comment('gets',$page,'GiveId',$giveid,'GetId');