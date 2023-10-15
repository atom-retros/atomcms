<?php

use App\Providers\RouteServiceProvider;
use function Pest\Laravel\{assertAuthenticated, get, post};

test('registration screen can be rendered', function () {
    $response = get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = post('/register', [
        'username' => 'Test_User',
        'mail' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => true,
    ]);

    assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
