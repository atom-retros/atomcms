<?php

namespace Database\Seeders;

use App\Models\WebsiteTeam;
use Illuminate\Database\Seeder;

class WebsiteTeamSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            ['rank_name' => 'DJ'],
            ['rank_name' => 'Wired Expert'],
            ['rank_name' => 'Event planner'],
        ];

        WebsiteTeam::query()->upsert($teams, ['name']);
    }
}
