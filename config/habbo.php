<?php

return [
    /**
     * Rcon configuration.
     */
    'rcon' => [
        'host' => env('RCON_HOST', '127.0.0.1'),
        'port' => env('RCON_PORT', 3001),
        'domain' => AF_INET,
        'type' => SOCK_STREAM,
        'protocol' => SOL_TCP,
    ],

    'client' => [
        'nitro_path' => '/client/html5/nitro-client' // Path where the index.html is
    ],

    'site' => [
        'swf_folder' => 'https://open.habstar.net/client/flash',
    ]
];