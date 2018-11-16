<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/11/16
 * Time: 11:09
 */

namespace App\Services\Impl;


use App\Exceptions\ServiceException;
use App\Services\BaseService;
use App\Services\UploadService;
use Illuminate\Support\Facades\Log;

class UploadImplService extends BaseService implements UploadService
{
    public function getInit($dir = null)
    {
        $url = \config('rpc.domain') . '?service=storage';
        try{
            $client = new \Yar_Client($url);
            $client->SetOpt(YAR_OPT_CONNECT_TIMEOUT, 5000);
            $client->SetOpt(YAR_OPT_HEADER, array("ak: val"));
            $result = $client->test();
        } catch (\Exception $e){
            Log::error($e->getMessage());
            throw new ServiceException('rpc客户端服务失败');
        }

        return ['result' => $result, 'url' => $url];
    }
}