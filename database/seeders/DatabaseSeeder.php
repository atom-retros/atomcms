<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WebsiteSettingsSeeder::class,
            WebsiteLanguageSeeder::class,
            WebsiteArticleSeeder::class,
            WebsitePermissionSeeder::class,
            WebsiteWordfilterSeeder::class,
            WebsiteTeamSeeder::class,
            WebsiteRuleCategorySeeder::class,
            WebsiteRuleSeeder::class,
            WebsiteHelperCenterCategorySeeder::class,
            WebsiteShopArticleSeeder::class,
            WebsiteShopCategoriesSeeder::class,
            WebsiteHelperCenterCategorySeeder::class,
            WebsiteRareValuesCategorySeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
