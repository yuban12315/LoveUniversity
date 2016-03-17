<?php
/**
 * Created by PhpStorm.
 * User: LC
 * Date: 2016/3/12
 * Time: 14:53
 */
function ch_json_encode($data) {
    $ret = ch_urlencode($data);
    $ret =json_encode($ret);
    return urldecode($ret);
}
function ch_urlencode($data) {
    if (is_array($data) || is_object($data)) {
        foreach ($data as$k => $v) {
            if (is_scalar($v)) {
                if (is_array($data)) {
                    $data[$k] = urlencode($v);
                } elseif (is_object($data)) {
                    $data->$k =urlencode($v);
                }
            } elseif (is_array($data)) {
                $data[$k] = ch_urlencode($v);//递归调用该函数
            } elseif (is_object($data)) {
                $data->$k = ch_urlencode($v);
            }
        }
    }
    return $data;
}