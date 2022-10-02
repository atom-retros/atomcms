<?php

namespace Database\Seeders;

use App\Models\WebsiteShopProduct;
use Illuminate\Database\Seeder;

class WebsiteShopProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'data' => json_encode([
                    'name' => 'Bronze VIP',
                    'description' => 'Our lowest VIP rank',
                    'content' => [
                        'badges' => ['BVIP'],
                        'rank' => 2,
                        'currencies' => [
                            'credits' => 25000,
                            'types' => [
                                0 => 25000,
                                5 => 250,
                                101 => 50,
                            ],
                        ],
                    ],
                    'price' => 5,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    'name' => 'Silver VIP',
                    'description' => 'Our middle ground VIP rank',
                    'content' => [
                        'badges' => ['BVIP', 'SVIP'],
                        'rank' => 3,
                        'currencies' => [
                            'credits' => 35000,
                            'types' => [
                                0 => 35000,
                                5 => 350,
                                101 => 75,
                            ],
                        ],
                    ],
                    'price' => 10,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    'name' => 'Gold VIP',
                    'description' => 'Our highest VIP rank',
                    'content' => [
                        'badges' => ['BVIP', 'SVIP', 'GVIP'],
                        'rank' => 4,
                        'currencies' => [
                            'credits' => 45000,
                            'types' => [
                                0 => 45000,
                                5 => 450,
                                101 => 100,
                            ],
                        ],
                    ],
                    'price' => 15,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    [
                        'item_id' => 202,
                        'quantity' => 5,
                    ],
                    [
                        'item_id' => 250,
                        'quantity' => 10,
                    ],
                    'price' => 10,
                ]),
                'type' => 'furniture',
            ],
            [
                'data' => json_encode([
                    [
                        'item_id' => 202,
                        'quantity' => 15,
                    ],
                    [
                        'item_id' => 250,
                        'quantity' => 20,
                    ],
                    'price' => 15,
                ]),
                'type' => 'furniture',
            ],
        ];

        foreach ($products as $product) {
            WebsiteShopProduct::query()->create([
                'data' => $product['data'],
                'type' => $product['type'],
            ]);
        }
    }
}
