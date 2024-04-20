<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUser(): User|Authenticatable|null
    {
        return Auth::user();
    }

    public function updateField($user, string $field, string|null $value): void
    {
        $user->update([
            $field => $value,
        ]);
    }

    public function updateUsername($user, $username): void
    {
        $user->update([
            'username' => $username,
        ]);
    }

    public function updateEmail($user, $email): void
    {
        $user->update([
            'mail' => $email,
        ]);
    }

    public function updateMotto($user, $motto): void
    {
        $user->update([
            'motto' => $motto,
        ]);
    }
}
