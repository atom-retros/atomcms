<?php

namespace App\Services;

use App\Models\WebsitePermission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PermissionsService
{
    public ?Collection $permission;

    public function __construct()
    {
        $this->permission = WebsitePermission::all()->pluck('value', 'key');
    }

    public function getPermission(string $permissionName): ?int
    {
        return (int) $this->permission->get($permissionName);
    }

    public function hasPermission(string $permission): bool
    {
        return $this->getPermission($permission) && Auth::user()->rank >= $this->getPermission($permission);
    }
}
