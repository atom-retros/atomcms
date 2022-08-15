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
        ];

        WebsiteLanguage::query()->upsert($languages, ['country_code', 'language']);
    }
}
