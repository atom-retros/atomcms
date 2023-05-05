<?php

namespace Database\Seeders;

use App\Models\WebsiteRuleCategory;
use Illuminate\Database\Seeder;

class WebsiteRuleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'General Rules',
                'description' => 'The general rules of the hotel',
                'badge' => 'hotel-icon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Account Rules',
                'description' => 'The general account rules on Habbo',
                'badge' => 'hotel-icon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel',
                'description' => 'Hotel rules & guidelines',
                'badge' => 'hotel-icon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        WebsiteRuleCategory::upsert($categories, ['name']);
    }
}
