<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/19
 * Time: 16:11
 */

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    public function login(Request $request){
        $code = $request->post('code');
        $userInfo = $request->post('user_info');
        Log::info('测试', $userInfo);
        $userInfo = json_decode($userInfo['detail'])['userInfo'];
        list($openId, $sessionKey) = $this->getWechatService()->getCode2Session($code);
        $userInfo['session_key'] = $sessionKey;
        $userInfo['open_id'] = $openId;
        if (resolve(UserService::class)->ifExistByOpenId($openId)){
//            Cache::forever($this->generateSessionKey($openId), json_encode($userInfo));
            return reply(200, '登陆成功');
        } else {
            resolve(UserService::class)->register($userInfo);
//            Cache::forever($this->generateSessionKey($openId), json_encode($userInfo));
            return reply(200, '注册成功');
        }
    }
}