<?php

return [
    'migrations' => [
        // Only set this to true in the .env file if your CERTAIN that you want to rename coliding table names
        'rename_tables' => env('RENAME_COLLIDING_TABLES', false)
    ],

    'rcon' => [
        'host' => env('RCON_HOST', '127.0.0.1'),
        'port' => env('RCON_PORT', 3001),
        'domain' => AF_INET,
        'type' => SOCK_STREAM,
        'protocol' => SOL_TCP,
    ],

    'client' => [
        'nitro_path' => env('NITRO_CLIENT_PATH', '/client/html5/nitro-client') // Path where the index.html is
    ],

    'site' => [
        'swf_path' => env('SWF_PATH', '/client/flash/swfs'),
        'recaptcha_site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
        'recaptcha_secret_key' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
    ],

    'findretros' => [
        'enabled' => env('FINDRETROS_ENABLED', false),
        'name' => env('FINDRETROS_NAME', 'Example'),
        'api' => 'https://findretros.com',
    ],
];
