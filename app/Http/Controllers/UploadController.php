<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/11/16
 * Time: 11:08
 */

namespace App\Http\Controllers;


use App\Http\ResponseCode;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController
{
    public function init(Request $request){
        $data = resolve(UploadService::class)->getInit();
        return reply(ResponseCode::$statusSuccess, '', $data);
    }
}