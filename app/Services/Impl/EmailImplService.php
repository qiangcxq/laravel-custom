<?php
/**
 * Created by PhpStorm.
 * User: hr
 * Date: 2018/9/18
 * Time: 13:46
 */

namespace App\Services\Impl;


use App\Services\BaseService;
use App\Services\EmailService;
use Illuminate\Support\Facades\Log;

class EmailImplService extends BaseService implements EmailService
{
    public function test(){
        Log::info('测试Email');
    }
}