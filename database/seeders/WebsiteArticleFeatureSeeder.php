<?php

namespace Database\Seeders;

use App\Models\WebsiteShopArticles;
use Illuminate\Database\Seeder;

class WebsiteArticleFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $articles = WebsiteShopArticles::all();
        $firstArticle = $articles[0];
        $secondArticle = $articles[1];
        $thirdArticle = $articles[2];

        if (!$firstArticle) {
            return;
        }

        $features = [
            [
                'article_id' => $firstArticle->id,
                'features' => json_encode([
                    'Bronze VIP badge',
                    'Bronze VIP catalogue',
                    'Bronze VIP commands',
                    '350 credits every 15 minutes',
                    '350 duckets every 15 minutes',
                    '1 diamond every hour',
                ]),
            ],
            [
                'article_id' => $secondArticle->id,
                'features' => json_encode([
                    'Everything from Bronze VIP',
                    'Silver VIP badge',
                    'Silver VIP catalogue',
                    'Silver VIP commands',
                    '450 credits every 15 minutes',
                    '450 duckets every 15 minutes',
                    '2 diamond every hour',
                ]),
            ],
            [
                'article_id' => $thirdArticle->id,
                'features' => json_encode([
                    'Everything from Silver VIP',
                    'Gold VIP badge',
                    'Gold VIP catalogue',
                    'Gold VIP commands',
                    '550 credits every 15 minutes',
                    '550 duckets every 15 minutes',
                    '3 diamond every hour',
                ]),
            ],
        ];
    }
}
