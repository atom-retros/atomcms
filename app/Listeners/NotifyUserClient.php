<?php

namespace App\Listeners;

use App\Events\UserClient;
use Illuminate\Support\Facades\Cache;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class NotifyUserClient
{
    /**
     * Handle the event.
     */
    public function handle(UserClient $event): void
    {
        $cacheKey = sprintf('user-client-notified-%s', $event->user->id);

        if (! config('discord-alerts.webhook_urls.client') || Cache::has($cacheKey)) {
            return;
        }

        DiscordAlert::to('client')
            ->message(sprintf('**%s** has entered the client.', $event->user->username));

        Cache::put($cacheKey, true, now()->addHour());
    }
}
