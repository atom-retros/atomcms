<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'theme',
                'value' => 'noname',
                'comment' => 'Specifies the theme of the CMS',
            ],
            [
                'key' => 'hotel_name',
                'value' => 'No Name',
                'comment' => 'Specifies the name of the hotel',
            ],
            [
                'key' => 'rcon_ip',
                'value' => '127.0.0.1',
                'comment' => 'Specifies the RCON IP used for the CMS to perform RCON commands',
            ],
            [
                'key' => 'rcon_port',
                'value' => '3001',
                'comment' => 'Specifies the RCON port used for the CMS to perform RCON commands',
            ],
            [
                'key' => 'start_motto',
                'value' => sprintf('I love %s hotel', setting('hotel_name')),
                'comment' => 'Specifies the start motto the user gets assigned upon registration',
            ],
            [
                'key' => 'start_credits',
                'value' => '5000',
                'comment' => 'Specifies the amount of start credits upon registration',
            ],
            [
                'key' => 'start_duckets',
                'value' => '5000',
                'comment' => 'Specifies the amount of start duckets upon registration',
            ],
            [
                'key' => 'start_diamonds',
                'value' => '100',
                'comment' => 'Specifies the amount of start diamonds upon registration',
            ],
            [
                'key' => 'start_points',
                'value' => '0',
                'comment' => 'Specifies the amount of start points upon registration',
            ],
            [
                'key' => 'start_look',
                'value' => 'fa-201407-1324.hr-828-1035.ch-3001-1261-1408.sh-3068-92-1408.cp-9032-1308.lg-270-1281.hd-209-3',
                'comment' => 'Specifies the amount of start outfit upon registration',
            ],
        ];

        WebsiteSetting::query()->upsert($settings, ['key'], ['key', 'value']);
    }
}
