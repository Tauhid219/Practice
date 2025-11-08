<?php

namespace App\Providers;

use App\Services\MyFacadeService;
use Illuminate\Support\ServiceProvider;

class MyFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('MyServiceFacade', function ($app) {
            return new MyFacadeService();
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
