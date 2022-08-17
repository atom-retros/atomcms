<?php

use App\Models\WebsiteSetting;

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

function setting(string $setting): string
{
    return WebsiteSetting::query()->where('key', '=', $setting)->first()->value ?? '';
}
