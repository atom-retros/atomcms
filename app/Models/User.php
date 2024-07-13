<?php

namespace App\Models;

use Filament\Panel;
use Atom\Core\Models\User as Model;
use Atom\Core\Models\WebsiteSetting;
use Filament\Models\Contracts\FilamentUser;

class User extends Model implements FilamentUser
{
    /**
     * Override for filament user name.
     */
    public function getNameAttribute(): string
    {
        return $this->username;
    }

    /**
     * Determine if the user can access the given panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->rank >= WebsiteSetting::firstWhere('key', 'min_staff_rank')->value;
    }
}