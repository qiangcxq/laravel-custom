<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/29
 * Time: 13:57
 */

namespace App\Models\Impl;


use App\Models\BaseModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserImplModel extends BaseModel implements UserModel
{
    protected $table = 'user';

    public function ifExistByOpenId($openId)
    {
        return DB::table($this->table)->where('open_id', $openId)->exists();
    }

    public function register($userInfo)
    {
        return DB::table($this->table)
            ->insert([
                'open_id'     => $userInfo['open_id'],
                'username'    => $userInfo['nickName'],
                'avatar'      => $userInfo['avatarUrl'],
                'mobile'      => $userInfo['mobile'],
                'country'     => $userInfo['country'],
                'province'    => $userInfo['province'],
                'city'        => $userInfo['city'],
                'language'    => $userInfo['language'],
                'gender'      => $userInfo['gender'],
                'create_time' => time(),
                'update_time' => time(),
            ]);
    }
}