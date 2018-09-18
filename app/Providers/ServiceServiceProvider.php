<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\Impl\EmailImplService;
use App\Services\Impl\PostImplService;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
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
        $this->app->singleton(PostService::class, function (){
            return new PostImplService();
        });
        $this->app->singleton(EmailService::class, function (){
            return new EmailImplService();
        });
    }
}
