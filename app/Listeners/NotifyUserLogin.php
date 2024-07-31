<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserLogin
{
    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        if (!config('discord-alerts.webhook_urls.login') || $event->user->hidden_staff) {
            return;
        }

        DiscordAlert::to('login')
            ->message(sprintf('[%s] **%s** has logged in.', now()->format('H:i'), $event->user->username));
    }
}
