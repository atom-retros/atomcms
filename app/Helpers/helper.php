<?php

use App\Models\WebsiteSetting;

function setting(string $setting): string
{
    return WebsiteSetting::query()->where('key', '=', $setting)->first()->value ?? '';
}