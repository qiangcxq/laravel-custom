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
use App\Services\UserService;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;

class SessionImplService extends BaseService implements SessionService
{
    public function generateKey($session)
    {
        return "session:{$session}";
    }

    public function login($openId, $sessionKey, $userInfo)
    {
        $userInfo['open_id'] = $openId;
        $userInfo['session_key'] = $sessionKey;
        $session = $this->generateSession();
        $sessionRedisKey = $this->generateKey($session);
        if (!resolve(UserService::class)->ifExistByOpenId($openId)) resolve(UserService::class)->register($userInfo);
        Cache::forever($sessionRedisKey, json_encode($userInfo));
        return true;
    }

    private function generateSession(){
        $uuid = Uuid::uuid4();
        return str_replace('-', '', $uuid->toString());
    }
}