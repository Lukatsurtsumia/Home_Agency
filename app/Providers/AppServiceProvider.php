<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // Behind Cloudflare + Coolify's proxy, the app container only ever sees
        // plain HTTP internally, so url()/asset()/@vite() would otherwise emit
        // http:// links and get blocked as mixed content on the https:// page.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
