<?php

namespace Database\Seeders;

use App\Models\WebsiteShopArticles;
use Illuminate\Database\Seeder;

class WebsiteShopArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'name' => 'Bronze Package',
                'info' => 'Our lowest package',
                'icon' => 'bronze',
                'color' => '#c5630f',
                'costs' => 5,
                'credits' => 5000,
                'duckets' => 5000,
                'diamonds' => 5000,
                'badges' => '',
            ],
            [
                'name' => 'Silver Package',
                'info' => 'Our middle package',
                'icon' => 'silver',
                'color' => '#dddddd',
                'costs' => 10,
                'credits' => 10000,
                'duckets' => 10000,
                'diamonds' => 10000,
                'badges' => 'BAB09;UK574;TFF06',
            ],
        ];

        WebsiteShopArticles::upsert($articles, ['name']);
    }
}