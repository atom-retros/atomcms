<?php

namespace App\Providers;

use App\Services\SettingsService;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // TODO: Move to core service provider
        $this->app->singleton(
            SettingsService::class,
            fn () => new SettingsService()
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RedirectIfAuthenticated::redirectUsing(fn () => route('users.me'));
    }
}
