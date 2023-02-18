<?php

namespace Database\Seeders;

use App\Models\WebsiteRareValueCategory;
use Illuminate\Database\Seeder;

class WebsiteRareValuesCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Limited Edition',
                'badge' => 'hotel-icon',
                'priority' => 1,
            ],
            [
                'name' => 'Ultra rares',
                'badge' => 'hotel-icon',
                'priority' => 2,
            ],
            [
                'name' => 'Super rares',
                'badge' => 'hotel-icon',
                'priority' => 3,
            ],
            [
                'name' => 'Regulars',
                'badge' => 'hotel-icon',
                'priority' => 4,
            ],
        ];

        WebsiteRareValueCategory::upsert($categories, ['name'], ['name', 'badge', 'priority']);
    }
}
