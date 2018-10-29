<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 15:12
 */

namespace App\Services\Impl;


use App\Services\BaseService;
use App\Services\SessionService;

class SessionImplService extends BaseService implements SessionService
{
    public function generateKey($openId)
    {
        return "session:{$openId}";
    }
}