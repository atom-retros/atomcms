<?php

namespace App\Listeners;

use App\Events\UserLogout;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserLogout
{
    /**
     * Handle the event.
     */
    public function handle(UserLogout $event): void
    {
        if (!config('discord-alerts.webhook_urls.logout')) {
            return;
        }

        DiscordAlert::to('logout')
            ->message(sprintf('[%s] **%s** has logged out.', now()->format('H:i'), $event->user->username));
    }
}
