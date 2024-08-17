<?php

namespace App\Listeners;

use App\Events\UserLogout;
use Illuminate\Support\Facades\Cache;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserLogout
{
    /**
     * Handle the event.
     */
    public function handle(UserLogout $event): void
    {
        $cacheKey = sprintf('user-logout-notified-%s', $event->user->id);

        if (! config('discord-alerts.webhook_urls.logout') || Cache::has($cacheKey)) {
            return;
        }

        DiscordAlert::to('logout')
            ->message(sprintf('**%s** has logged out.', $event->user->username));

        Cache::put($cacheKey, true, now()->addHour());
    }
}
