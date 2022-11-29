<?php

use App\Models\WebsitePermission;
use App\Services\PermissionsService;
use App\Services\SettingsService;

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $_SERVER["REMOTE_ADDR"] = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

if (!function_exists('setting')) {
    function setting(string $setting): string
    {
        return app(SettingsService::class)->getOrDefault($setting);
    }
}

if (!function_exists('hasPermission')) {
    function hasPermission(string $permission): string
    {
        return app(PermissionsService::class)->getOrDefault($permission);
    }
}