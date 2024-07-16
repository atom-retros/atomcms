<?php

namespace App\Services;

use Atom\Core\Models\WebsiteSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

// TODO: Move to core package
class SettingsService
{
    public ?Collection $settings;

    public function __construct()
    {
        $this->settings = Schema::hasTable('website_settings') ? WebsiteSetting::all()->pluck('value', 'key') : collect();
    }

    public function getOrDefault(string $settingName, ?string $default = null): string
    {
        return (string) $this->settings->get($settingName, $default);
    }
}
