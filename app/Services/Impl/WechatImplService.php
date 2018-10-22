<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/22
 * Time: 13:58
 */

namespace App\Services\Impl;


use App\Services\BaseService;
use App\Services\WechatService;
use GuzzleHttp\Client;

class WechatImplService extends BaseService implements WechatService
{
    private $appId = 'wxb109c02c04ce721c';
    private $secret = 'a0d75f44ce1728db4ec22f5928806cc7';
    private $url = "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code";
    public function getCode2Session($code)
    {
        $client = new Client();
        $response = $client->get(sprintf($this->url, $this->appId, $this->secret, $code));
        return json_decode($response->getBody()->getContents(), true);
    }
}