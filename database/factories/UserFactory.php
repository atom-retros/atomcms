<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'mail' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'account_created' => time(),
            'last_login' => time(),
            'look' => 'hr-115-42.hd-180-1.ch-255-66.lg-280-64.sh-290-64',
            'credits' => 50000,
            'ip_register' => '127.0.0.1',
            'ip_current' => '127.0.0.1',
        ];
    }
}
