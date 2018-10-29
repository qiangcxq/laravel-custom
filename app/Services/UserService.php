<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 14:15
 */

namespace App\Services;


interface UserService
{
    public function ifExistByOpenId($openId);

    public function register($userInfo);
}