<?php

return [

    'title' => 'Connexion',

    'heading' => 'Connectez-vous à votre compte',

    'buttons' => [

        'submit' => [
            'label' => 'Se connecter',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Adresse e-mail',
        ],

        'username' => [
            'label' => 'Nom d\'utilisateur',
        ],

        'password' => [
            'label' => 'Mot de passe',
        ],

        'remember' => [
            'label' => 'Se souvenir de moi',
        ],

    ],

    'messages' => [
        'failed' => 'Ces informations d\'identification ne correspondent pas à nos enregistrements.',
        'throttled' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',
    ],

];
