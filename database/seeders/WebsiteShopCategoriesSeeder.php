<?php

namespace Database\Seeders;

use App\Models\Shop\WebsiteShopCategory;
use Illuminate\Database\Seeder;

class WebsiteShopCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'VIP',
                'slug' => 'vip',
            ],
            [
                'name' => 'Currency',
                'slug' => 'currency',
            ],
            [
                'name' => 'Badges',
                'slug' => 'badges',
            ],
            [
                'name' => 'Rares',
                'slug' => 'rares',
            ],
        ];

        WebsiteShopCategory::upsert($categories, ['slug'], ['name']);
    }
}
