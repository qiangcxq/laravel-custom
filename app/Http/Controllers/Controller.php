<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Services\PostService;
use App\Services\WechatService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function getEmailService(){
        return resolve(EmailService::class);
    }

    protected function getPostService(){
        return resolve(PostService::class);
    }

    protected function getWechatService(){
        return resolve(WechatService::class);
    }
}
