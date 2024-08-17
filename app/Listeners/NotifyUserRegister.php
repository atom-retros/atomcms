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
        if (! config('discord-alerts.webhook_urls.register')) {
            return;
        }

        DiscordAlert::to('register')
            ->message(sprintf('**%s** has registered.', $event->user->username));
    }
}
