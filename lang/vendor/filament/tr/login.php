<?php

return [

    'title' => 'Giriş Yap',

    'heading' => 'Hesabınıza giriş yapın',

    'buttons' => [

        'submit' => [
            'label' => 'Giriş yap',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'E-posta adresi',
        ],

        'username' => [
            'label' => 'Kullanıcı adı'
        ],

        'password' => [
            'label' => 'Şifre',
        ],

        'remember' => [
            'label' => 'Beni hatırla',
        ],

    ],

    'messages' => [
        'failed' => 'Bu kimlik bilgileri kayıtlarımızla eşleşmiyor.',
        'throttled' => 'Çok fazla giriş denemesi. Lütfen :seconds saniye sonra tekrar deneyin.',
    ],

];
