<?php

namespace App\Listeners;

use App\Events\UserRegister;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserRegister
{
    /**
     * Handle the event.
     */
    public function handle(UserRegister $event): void
    {
        if (! config('discord-alerts.webhook_urls.register') || $event->user->hidden_staff) {
            return;
        }

        DiscordAlert::to('register')
            ->message(sprintf('[%s] **%s** has registered.', now()->format('H:i'), $event->user->username));
    }
}
