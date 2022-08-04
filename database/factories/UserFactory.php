<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => fake()->userName(),
            'mail' => fake()->safeEmail(),
            'password' => Hash::make('password'),
            'account_created' => time(),
            'last_login' => time(),
            'look' => setting('start_look'),
            'credits' => setting('start_credits'),
            'ip_register' => '127.0.0.1',
            'ip_current' => '127.0.0.1',
        ];
    }
}
