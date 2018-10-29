<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 13:57
 */

namespace App\Models;


interface UserModel
{
    public function ifExistByOpenId($openId);

    public function register($userInfo);
}