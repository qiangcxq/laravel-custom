<?php

namespace App\Providers;

use App\Models\Impl\PostImplModel;
use App\Models\PostModel;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
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
        $this->app->singleton(PostModel::class, function (){
            return new PostImplModel();
        });
    }
}
