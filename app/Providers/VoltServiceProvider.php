<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class VoltServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $themes = File::directories(resource_path('themes'));

        Volt::mount(
            paths: Arr::map(
                array_merge([resource_path()], $themes),
                fn (string $theme) => sprintf('%s/views/livewire', $theme),
            ),
            uses: Arr::map(
                array_merge([resource_path()], $themes),
                fn (string $theme) => sprintf('%s/views/pages', $theme),
            ),
        );
    }
}
