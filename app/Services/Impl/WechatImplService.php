<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/22
 * Time: 13:58
 */

namespace App\Services\Impl;


use App\Exceptions\ServiceException;
use App\Services\BaseService;
use App\Services\WechatService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class WechatImplService extends BaseService implements WechatService
{
    private $appId = 'wxb109c02c04ce721c';
    private $secret = 'a0d75f44ce1728db4ec22f5928806cc7';
    private $url = "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code";

    public function getCode2Session($code)
    {
        $client = new Client();
        $response = $client->get(sprintf($this->url, $this->appId, $this->secret, $code));
        $result = json_decode($response->getBody()->getContents(), true);
        if (isset($result['errcode'])){
            throw new ServiceException('接口出现错误');
        }
        $openId = $result['openid'];
        $sessionKey = $result['session_key'];
        $userInfo['session_key'] = $sessionKey;
        Cache::forever($this->generateSessionKey($openId), json_encode($userInfo));
        return true;
    }

    public function generateSessionKey($openId){
        return "session:{$openId}";
    }
}