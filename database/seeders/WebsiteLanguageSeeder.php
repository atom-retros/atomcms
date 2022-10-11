<?php

namespace Database\Seeders;

use App\Models\WebsiteLanguage;
use Illuminate\Database\Seeder;

class WebsiteLanguageSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            ['country_code' => 'en', 'language' => 'English'],
            ['country_code' => 'da', 'language' => 'Danish'],
            ['country_code' => 'fi', 'language' => 'Finnish'],
            ['country_code' => 'de', 'language' => 'German'],
            ['country_code' => 'fr', 'language' => 'French'],
            ['country_code' => 'tr', 'language' => 'Turkish'],
            ['country_code' => 'se', 'language' => 'Swedish'],
            ['country_code' => 'nl', 'language' => 'Netherland'],
            ['country_code' => 'br', 'language' => 'Portuguese (Brazil)'],
            ['country_code' => 'it', 'language' => 'Italy'],
            ['country_code' => 'es', 'language' => 'Spain'],
        ];

        WebsiteLanguage::upsert($languages, ['country_code', 'language']);
    }
}
