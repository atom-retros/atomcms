<?php

namespace Database\Seeders;

use App\Models\WebsiteWordfilter;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WebsiteWordfilterSeeder extends Seeder
{
    public function run()
    {
        $words = [
            [
                'word' => 'fuck',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'idiot',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'hotel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'nigger',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'nigga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'retard',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'faggot',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'tranny',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'bitch',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'cunt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'cock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'word' => 'pussy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        WebsiteWordfilter::query()->upsert($words, ['word']);
    }
}
