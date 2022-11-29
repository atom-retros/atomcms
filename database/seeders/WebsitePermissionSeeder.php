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
                'permission' => 'bypass_vpn',
                'min_rank' => '6',
                'description' => 'Min rank to bypass vpn blocker check'
            ],
            [
                'permission' => 'view_server_logs',
                'min_rank' => '7',
                'description' => 'Minimum required rank to access the log viewer'
            ],
            [
                'permission' => 'housekeeping_access',
                'min_rank' => '7',
                'description' => 'Minimum required rank to access the log viewer'
            ],
        ];

        foreach ($permissions as $permission) {
            WebsitePermission::firstOrCreate(['permission' => $permission['permission']], [
                'permission' => $permission['permission'],
                'min_rank' => $permission['min_rank'],
                'description' => $permission['description'],
            ]);
        }
    }
}
