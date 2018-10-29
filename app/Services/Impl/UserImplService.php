<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 14:15
 */

namespace App\Services\Impl;


use App\Models\Impl\UserImplModel;
use App\Services\BaseService;
use App\Services\UserService;

class UserImplService extends BaseService implements UserService
{
    public function ifExistByOpenId($openId)
    {
        return resolve(UserImplModel::class)->ifExistByOpenId($openId);
    }

    public function register($userInfo)
    {
        return resolve(UserImplModel::class)->register($userInfo);
    }
}