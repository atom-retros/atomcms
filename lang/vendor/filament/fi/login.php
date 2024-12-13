<?php

return [

    'title' => 'Kirjaudu sisään',

    'heading' => 'Kirjaudu sisään tilillesi',

    'buttons' => [

        'submit' => [
            'label' => 'Kirjaudu sisään',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Sähköpostiosoite',
        ],

        'username' => [
            'label' => 'Käyttäjänimi'
        ],

        'password' => [
            'label' => 'Salasana',
        ],

        'remember' => [
            'label' => 'Muista minut',
        ],

    ],

    'messages' => [
        'failed' => 'Nämä tunnistetiedot eivät täsmää tietoihimme.',
        'throttled' => 'Liian monta kirjautumisyritystä. Yritä uudelleen :seconds sekunnin kuluttua.',
    ],

];
