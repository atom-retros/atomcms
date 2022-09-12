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
            [
                'key' => 'min_rank_to_view_logs',
                'value' => '7',
                'comment' => 'Minimum required rank to access the log viewer'
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
