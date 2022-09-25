<?php

namespace Database\Seeders;

use App\Models\WebsiteStoreProduct;
use Illuminate\Database\Seeder;

class WebsiteStoreProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'data' => json_encode([
                    'badge' => 'BVIP',
                    'rank' => 2,
                    'credits' => 25000,
                    'duckets' => 25000,
                    'diamonds' => 250,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    'badge' => 'SVIP',
                    'rank' => 3,
                    'credits' => 35000,
                    'duckets' => 35000,
                    'diamonds' => 350,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    'badge' => 'GVIP',
                    'rank' => 4,
                    'credits' => 45000,
                    'duckets' => 45000,
                    'diamonds' => 450,
                ]),
                'type' => 'vip',
            ],
            [
                'data' => json_encode([
                    'furniture' => [
                        [
                            'item_id' => 202,
                            'quantity' => 15,
                        ],
                        [
                            'item_id' => 250,
                            'quantity' => 20,
                        ],
                    ]
                ]),
                'type' => 'rares',
            ],
        ];

        foreach ($products as $product) {
            WebsiteStoreProduct::query()->create([
                'data' => $product['data'],
                'type' => $product['type'],
            ]);
        }
    }
}
