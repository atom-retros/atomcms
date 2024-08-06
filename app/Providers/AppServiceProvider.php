<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

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
        RateLimiter::for('api', fn (Request $request) => Limit::perMinute(60)->by($request->user()?->id ?: $request->ip()));

        RedirectIfAuthenticated::redirectUsing(fn () => route('users.me'));

        Config::set('view.paths', collect(File::directories(resource_path('themes')))
            ->map(fn (string $theme) => sprintf('%s/views', $theme))
            ->each(fn (string $theme) => View::addLocation($theme))
            ->pipe(fn ($collection) => collect(View::getFinder()->getPaths()))
            ->unique()
            ->values()
            ->toArray());
    }
}
