<?php

namespace Database\Seeders;

use App\Models\WebsiteInstallation;
use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        WebsiteInstallation::query()->insert(['completed' => true, 'installation_key' => 'key']);

        $this->call([
            WebsiteSettingsSeeder::class,
            WebsiteLanguageSeeder::class,
            WebsitePermissionSeeder::class,
        ]);
    }
}
