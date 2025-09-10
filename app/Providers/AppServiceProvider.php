<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // 👈 IMPORTANTE
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fuerza https detrás de proxies (Railway) solo en producción
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
