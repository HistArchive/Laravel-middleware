<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal())
        {$this->app['request']->server->set('http', true);}
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
