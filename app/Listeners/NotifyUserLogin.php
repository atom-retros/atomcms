<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Support\Facades\Cache;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserLogin
{
    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        $cacheKey = sprintf('user-login-notified-%s', $event->user->id);

        if (! config('discord-alerts.webhook_urls.login') || Cache::has($cacheKey)) {
            return;
        }

        DiscordAlert::to('login')
            ->message(sprintf('**%s** has logged in.', $event->user->username));

        Cache::put($cacheKey, true, now()->addHour());
    }
}
