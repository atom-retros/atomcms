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
                'info' => 'To give your account a slight boost',
                'icon_url' => 'https://i.imgur.com/1VGFYSL.gif',
                'color' => '#c5630f',
                'costs' => 500,
                'give_rank' => 2,
                'credits' => 5000,
                'duckets' => 5000,
                'diamonds' => 100,
                'badges' => 'VipParties2',
                'furniture' => null,
            ],
            [
                'name' => 'Silver Package',
                'info' => 'Our package the fits for most',
                'icon_url' => 'https://i.imgur.com/5NBdR0z.gif',
                'color' => '#dddddd',
                'costs' => 1000,
                'give_rank' => 3,
                'credits' => 10000,
                'duckets' => 10000,
                'diamonds' => 300,
                'badges' => 'VipParties2_Top100',
                'furniture' => null,
            ],
            [
                'name' => 'Gold VIP',
                'info' => 'Our most exclusive VIP package',
                'icon_url' => 'https://i.imgur.com/NiVvRrs.gif',
                'color' => '#E4A317FF',
                'costs' => 1500,
                'give_rank' => 4,
                'credits' => 15000,
                'duckets' => 15000,
                'diamonds' => 500,
                'badges' => 'VipParties2_Top10',
                'furniture' => null,
            ],
            // Example for furniture pack
            /*
            [
                'name' => 'Furniture Pack #1',
                'info' => 'The perfect pack for the casino builder',
                'icon' => 'gold',
                'color' => '#E4A317FF',
                'costs' => 750,
                'badges' => 'VipParties2_Top100',
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
            */
            // Example for badge pack
            /*
            [
                'name' => 'Badge Pack #1',
                'info' => 'The perfect pack for the badge collector',
                'icon' => 'gold',
                'color' => '#E4A317FF',
                'costs' => 250,
                'badges' => 'BADGE_CODE_1;BADGE_CODE_2;BADGE_CODE_3;BADGE_CODE_4;BADGE_CODE_5',
            ],
            */

            // Example for currency pack
            /*
            [
                'name' => 'Currency Pack #1',
                'info' => 'The perfect pack to boost your account',
                'icon' => 'gold',
                'color' => '#E4A317FF',
                'costs' => 250,
                'credits' => 25000,
                'duckets' => 35000,
                'diamonds' => 2500,
            ],
            */
        ];

        foreach ($articles as $article) {
            WebsiteShopArticles::firstOrCreate(['name' => $article['name']], [
                'name' => $article['name'],
                'info' => $article['info'],
                'icon_url' => $article['icon_url'],
                'color' => $article['color'],
                'costs' => $article['costs'],
                'give_rank' => $article['give_rank'] ?? null,
                'credits' => $article['credits'] ?? null,
                'duckets' => $article['duckets'] ?? null,
                'diamonds' => $article['diamonds'] ?? null,
                'badges' => $article['badges'] ?? null,
                'furniture' =>  $article['furniture'] ?? null,
            ]);
        }
    }
}
