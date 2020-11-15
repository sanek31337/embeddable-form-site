<?php

namespace App\Providers;

use App\Services\JsonRPCService;
use Illuminate\Support\ServiceProvider;

class JsonRPCServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("JsonRPCService", JsonRPCService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
