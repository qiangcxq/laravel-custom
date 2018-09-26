<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\Impl\EmailImplService;
use App\Services\Impl\PostImplService;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public $singletons = [
        PostService::class => PostImplService::class,
        EmailService::class => EmailImplService::class
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
