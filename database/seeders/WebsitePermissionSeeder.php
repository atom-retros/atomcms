<?php

namespace Database\Seeders;

use App\Models\WebsitePermission;
use Illuminate\Database\Seeder;

class WebsitePermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'key' => 'min_rank_to_bypass_vpn_check',
                'value' => '6',
                'comment' => 'Min rank to bypass vpn blocker check'
            ],
        ];

        foreach ($permissions as $permission) {
            WebsitePermission::query()->firstOrCreate(['key' => $permission['key']], [
                'key' => $permission['key'],
                'value' => $permission['value'],
                'comment' => $permission['comment'],
            ]);
        }

    }
}
