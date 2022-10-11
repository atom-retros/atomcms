<?php

namespace App\Services;

use App\Models\WebsiteSetting;
use Illuminate\Support\Collection;

class SettingsService
{
    public ?Collection $settings;

    public function __construct()
    {
        $this->settings = WebsiteSetting::all()->pluck('value', 'key');
    }

    public function getOrDefault(string $settingName, string $default = ''): ?string
    {
        return (string) $this->settings->get($settingName) ?? $default;
    }
}
