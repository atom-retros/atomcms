<?php

return [
    /*
     * The webhook URLs that we'll use to send a message to Discord.
     */
    'webhook_urls' => [
        'default' => env('DISCORD_ALERT_WEBHOOK'),
        'login' => env('DISCORD_ALERT_LOGIN_WEBHOOK'),
        'register' => env('DISCORD_ALERT_REGISTER_WEBHOOK'),
        'logout' => env('DISCORD_ALERT_LOGOUT_WEBHOOK'),
        'client' => env('DISCORD_ALERT_CLIENT_WEBHOOK'),
    ],

    /*
     * This job will send the message to Discord. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job' => Spatie\DiscordAlerts\Jobs\SendToDiscordChannelJob::class,
];
