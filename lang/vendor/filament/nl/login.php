<?php

return [
    'title' => 'Inloggen',

    'heading' => 'Log in op je account',

    'buttons' => [
        'submit' => [
            'label' => 'Inloggen',
        ],
    ],

    'fields' => [
        'email' => [
            'label' => 'E-mailadres',
        ],
        'username' => [
            'label' => 'Gebruikersnaam',
        ],
        'password' => [
            'label' => 'Wachtwoord',
        ],
        'remember' => [
            'label' => 'Onthoud mij',
        ],
    ],

    'messages' => [
        'failed' => 'Deze inloggegevens komen niet overeen met onze gegevens.',
        'throttled' => 'Te veel inlogpogingen. Probeer het opnieuw in :seconds seconden.',
    ],
];
