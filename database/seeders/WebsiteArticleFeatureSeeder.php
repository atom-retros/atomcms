<?php

namespace Database\Seeders;

use App\Models\WebsiteShopArticleFeature;
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
                    ['feature' => 'Bronze VIP badge'],
                    ['feature' => 'Bronze VIP catalogue'],
                    ['feature' => 'Bronze VIP commands'],
                    ['feature' => '350 credits every 15 minutes'],
                    ['feature' => '350 duckets every 15 minutes'],
                    ['feature' => '1 diamond every hour'],
                ]),
            ],
            [
                'article_id' => $secondArticle->id,
                'features' => json_encode([
                    ['feature' => 'Everything from Bronze VIP'],
                    ['feature' => 'Silver VIP badge'],
                    ['feature' => 'Silver VIP catalogue'],
                    ['feature' => 'Silver VIP commands'],
                    ['feature' => '450 credits every 15 minutes'],
                    ['feature' => '450 duckets every 15 minutes'],
                    ['feature' => '2 diamond every hour'],
                ]),
            ],
            [
                'article_id' => $thirdArticle->id,
                'features' => json_encode([
                    ['feature' => 'Everything from Silver VIP'],
                    ['feature' => 'Gold VIP badge'],
                    ['feature' => 'Gold VIP catalogue'],
                    ['feature' => 'Gold VIP commands'],
                    ['feature' => '550 credits every 15 minutes'],
                    ['feature' => '550 duckets every 15 minutes'],
                    ['feature' => '3 diamond every hour'],
                ]),
            ],
        ];

        WebsiteShopArticleFeature::upsert($features, ['article_id']);
    }
}
