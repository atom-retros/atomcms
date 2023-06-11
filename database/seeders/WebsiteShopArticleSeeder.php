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
                'furniture' => null,
            ],
            [
                'name' => 'Silver Package',
                'info' => 'Our middle package',
                'icon' => 'silver',
                'color' => '#dddddd',
                'costs' => 10,
                'rank' => 3,
                'credits' => 10000,
                'duckets' => 10000,
                'diamonds' => 10000,
                'badges' => 'BAB09;UK574;TFF06',
                'furniture' => json_encode([
                    [
                        'item_id' => 202,
                        'amount' => 5,
                    ],
                    [
                        'item_id' => 212,
                        'amount' => 2,
                    ],
                    [
                        'item_id' => 230,
                        'amount' => 2,
                    ],
                ]),
            ],
        ];

        foreach ($articles as $article) {
            WebsiteShopArticles::firstOrCreate(['name' => $article['name']], [
                'name' => $article['name'],
                'info' => $article['info'],
                'icon' => $article['icon'],
                'color' => $article['color'],
                'costs' => $article['costs'],
                'give_rank' => $article['give_rank'],
                'credits' => $article['credits'],
                'duckets' => $article['duckets'],
                'diamonds' => $article['diamonds'],
                'badges' => $article['badges'],
                'furniture' =>  $article['furniture'],
            ]);
        }
    }
}
