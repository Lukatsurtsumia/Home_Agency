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
        // Covers route()/url(). Vite's @vite() asset URLs go through asset(),
        // which reads its root from config('app.asset_url') -- i.e. the
        // ASSET_URL env var -- set at boot time, not settable here at runtime.
        // See .env / Coolify: ASSET_URL must equal APP_URL in production.
        $appUrl = config('app.url');

        if ($appUrl && $scheme = parse_url($appUrl, PHP_URL_SCHEME)) {
            URL::forceScheme($scheme);
        }
    }
}
