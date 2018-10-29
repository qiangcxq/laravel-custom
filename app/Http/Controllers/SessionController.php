<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/19
 * Time: 16:11
 */

namespace App\Http\Controllers;


use App\Services\SessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login(Request $request){
        $code = $request->post('code');
        $userInfo = $request->post('user_info')['detail']['userInfo'];
        list($openId, $sessionKey) = $this->getWechatService()->getCode2Session($code);
        $session = resolve(SessionService::class)->login($openId, $sessionKey, $userInfo);
        return reply(200, '', ['session' => $session]);
    }
}