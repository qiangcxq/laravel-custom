<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/24
 * Time: 16:47
 */
function reply($code, $msg = '', $data = []){
    return response()->json([
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
    ]);
}