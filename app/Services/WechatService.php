<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/22
 * Time: 13:57
 */

namespace App\Services;


interface WechatService
{
    public function getCode2Session($code);
}