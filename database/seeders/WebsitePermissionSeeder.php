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
            [
                'key' => 'min_rank_to_submit_event_winners',
                'value' => '6',
                'comment' => 'Minimum required rank to submit event winners'
            ],
            [
                'key' => 'min_rank_to_reset_event_entries',
                'value' => '6',
                'comment' => 'Minimum required rank to reset event entries'
            ],
            [
                'key' => 'min_rank_to_delete_event_submissions',
                'value' => '6',
                'comment' => 'Minimum required rank to delete event submissions'
            ],
            [
                'key' => 'min_housekeeping_rank',
                'value' => '6',
                'comment' => 'Minimum required rank to visit housekeeping'
            ],
        ];

        foreach ($permissions as $permission) {
            WebsitePermission::firstOrCreate(['key' => $permission['key']], [
                'key' => $permission['key'],
                'value' => $permission['value'],
                'comment' => $permission['comment'],
            ]);
        }

    }
}
