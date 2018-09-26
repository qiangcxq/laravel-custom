<?php

namespace App\Providers;

use App\Models\Impl\PostImplModel;
use App\Models\PostModel;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    public $singletons = [
        PostModel::class => PostImplModel::class
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
