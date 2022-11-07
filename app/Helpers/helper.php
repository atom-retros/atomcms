<?php

use App\Models\WebsitePermission;
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

if (!function_exists('permission')) {
    function permission(string $permission): string|int
    {
        $permission = WebsitePermission::where('key', '=', $permission)->first();

        if (is_null($permission)) {
            return 999;
        }

        return $permission->value;
    }
}
