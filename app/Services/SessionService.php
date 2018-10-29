<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 15:12
 */

namespace App\Services;


interface SessionService
{
    public function generateKey($openId);
}