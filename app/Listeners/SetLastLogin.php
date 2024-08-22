<?php

namespace App\Listeners;

use App\Events\UserLogin;

class SetLastLogin
{
    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        $event->user->update([
            'last_login' => time(),
            'ip_current' => request()->ip(),
        ]);
    }
}
