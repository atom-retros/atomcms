<?php

namespace App\Providers;

use App\Exceptions\MigrationFailedException;
use App\Services\PermissionsService;
use App\Services\RconService;
use App\Services\SettingsService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Srmklive\PayPal\Services\PayPal as PaypalClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \Illuminate\Foundation\Vite::class,
            \App\Services\ViteService::class
        );

        $this->app->singleton(
            SettingsService::class,
            fn () => new SettingsService()
        );

        $this->app->singleton(
            PermissionsService::class,
            fn () => new PermissionsService()
        );

        $this->app->singleton(
            RconService::class,
            fn () => new RconService()
        );

        $this->app->bind(PaypalClient::class, function () {
            $client = new PaypalClient();
            $client->setApiCredentials(config('habbo.paypal'));
            $client->getAccessToken();

            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (config('habbo.site.force_https')) {
            URL::forceScheme('https');
        }
    }
}
