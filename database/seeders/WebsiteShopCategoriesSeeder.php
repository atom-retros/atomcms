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
                'icon' => 'https://i.imgur.com/YiI0I1i.png',
            ],
            [
                'name' => 'Currency',
                'slug' => 'currency',
                'icon' => 'https://i.imgur.com/YiI0I1i.png',
            ],
            [
                'name' => 'Badges',
                'slug' => 'badges',
                'icon' => 'https://i.imgur.com/YiI0I1i.png',
            ],
            [
                'name' => 'Rares',
                'slug' => 'rares',
                'icon' => 'https://i.imgur.com/YiI0I1i.png',
            ],
        ];

        WebsiteShopCategory::upsert($categories, ['slug'], ['name', 'icon']);
    }
}
