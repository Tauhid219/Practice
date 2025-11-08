<?php

namespace App\Providers;

use App\Services\MyCustomService;
use Illuminate\Support\ServiceProvider;

class MyCustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MyCustomService::class, function ($app) {
            return new MyCustomService();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
