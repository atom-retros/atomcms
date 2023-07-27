<?php

namespace Database\Seeders;

use App\Models\WebsiteHelpCenterTicketStatus;
use Illuminate\Database\Seeder;

class WebsiteHelpCenterTicketStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            [
                'id' => 1,
                'name' => 'open',
            ],
            [
                'id' => 2,
                'name' => 'awaiting reply',
            ],
            [
                'id' => 3,
                'name' => 'replied',
            ],
            [
                'id' => 4,
                'name' => 'closed',
            ]
        ];

        WebsiteHelpCenterTicketStatus::query()->upsert($statuses, ['id']);
    }
}
