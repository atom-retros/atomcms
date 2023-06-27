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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->initBaseTables();

        if (config('habbo.site.force_https')) {
            URL::forceScheme('https');
        }
    }

    private function initBaseTables(): void
    {
        if (!Schema::hasTable('website_settings') && !Cache::get('website_settings_installed')) {
            try {
                Artisan::call('migrate --path=/database/migrations/2022_08_01_204744_create_table_website_settings.php');
                Artisan::call('db:seed --class=WebsiteSettingsSeeder');
            } catch (MigrationFailedException $e) {
                Log::error('Migration or seeding failed: ' . $e->getMessage());

                abort(500);
            }

            Cache::forever('website_settings_installed', true);
        }

        if (!Schema::hasTable('website_languages') && !Cache::get('website_languages_installed')) {
            try {
                Artisan::call('migrate --path=/database/migrations/2022_08_04_171615_create_website_languages_table.php');
                Artisan::call('db:seed --class=WebsiteLanguageSeeder');
            } catch (MigrationFailedException $e) {
                Log::error('Migration or seeding failed: ' . $e->getMessage());

                abort(500);
            }

            Cache::forever('website_languages_installed', true);
        }
    }
}
