<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\Impl\EmailImplService;
use App\Services\Impl\PostImplService;
use App\Services\Impl\SessionImplService;
use App\Services\Impl\UploadImplService;
use App\Services\Impl\UserImplService;
use App\Services\Impl\WechatImplService;
use App\Services\PostService;
use App\Services\SessionService;
use App\Services\UploadService;
use App\Services\UserService;
use App\Services\WechatService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public $singletons = [
        PostService::class => PostImplService::class,
        EmailService::class => EmailImplService::class,
        WechatService::class => WechatImplService::class,
        UserService::class => UserImplService::class,
        SessionService::class => SessionImplService::class,
        UploadService::class => UploadImplService::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
