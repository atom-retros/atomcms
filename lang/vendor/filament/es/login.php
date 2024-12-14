<?php

return [

    'title' => 'Iniciar sesión',

    'heading' => 'Ingresa a tu cuenta',

    'buttons' => [

        'submit' => [
            'label' => 'Iniciar sesión',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Dirección de correo electrónico',
        ],

        'username' => [
            'label' => 'Nombre de usuario'
        ],

        'password' => [
            'label' => 'Contraseña',
        ],

        'remember' => [
            'label' => 'Recordarme',
        ],

    ],

    'messages' => [
        'failed' => 'Estas credenciales no coinciden con nuestros registros.',
        'throttled' => 'Demasiados intentos de inicio de sesión. Por favor, inténtalo de nuevo en :seconds segundos.',
    ],

];
