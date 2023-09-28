<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use function Pest\Laravel\{get, post, assertGuest, assertAuthenticated};

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('login screen can be rendered', function () {
    $response = get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    post('/login', [
        'username' => $user->username,
        'password' => 'password',
    ])->assertRedirect(RouteServiceProvider::HOME);
    assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    post('/login', [
        'username' => $user->username,
        'password' => 'wrong-password',
    ]);

    assertGuest();
});
