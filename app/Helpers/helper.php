<?php

use App\Services\SettingsService;

if (! function_exists('setting')) {
    function setting(string $setting): string
    {
        return app(SettingsService::class)->getOrDefault($setting);
    }
}

// TODO: implement
if (! function_exists('hasPermission')) {
    function hasPermission(string $setting): string
    {
        return false;
    }
}
