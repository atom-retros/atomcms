<?php

return [

    'title' => 'Anmeldung',

    'heading' => 'Melden Sie sich mit Ihrem Konto an',

    'buttons' => [

        'submit' => [
            'label' => 'Anmelden',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'E-Mail',
        ],

        'username' => [
            'label' => 'User Name'
        ],

        'password' => [
            'label' => 'Passwort',
        ],

        'remember' => [
            'label' => 'Hast du dein Passwort vergessen?',
        ],

    ],

    'messages' => [
        'failed' => 'Diese Anmeldeinformationen stimmen nicht mit unseren Unterlagen Ã¼berein.',
        'throttled' => 'Zu viele Anmeldeversuche. Bitte versuchen Sie es in :seconds Sekunden erneut.',
    ],

];
