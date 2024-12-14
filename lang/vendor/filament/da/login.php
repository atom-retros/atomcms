<?php

return [

    'title' => 'Log ind',

    'heading' => 'Log ind på din konto',

    'buttons' => [

        'submit' => [
            'label' => 'Log ind',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'E-mail adresse',
        ],

        'username' => [
            'label' => 'Brugernavn'
        ],

        'password' => [
            'label' => 'Adgangskode',
        ],

        'remember' => [
            'label' => 'Husk mig',
        ],

    ],

    'messages' => [
        'failed' => 'Disse legitimationsoplysninger matcher ikke vores optegnelser.',
        'throttled' => 'For mange login forsøg. Prøv igen om :seconds sekunder.',
    ],

];
