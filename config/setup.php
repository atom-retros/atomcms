<?php

use Database\Seeders\WebsiteArticleSeeder;
use Database\Seeders\WebsiteLanguageSeeder;
use Database\Seeders\WebsitePermissionSeeder;
use Database\Seeders\WebsiteRuleCategorySeeder;
use Database\Seeders\WebsiteRuleSeeder;
use Database\Seeders\WebsiteSettingsSeeder;
use Database\Seeders\WebsiteTeamSeeder;
use Database\Seeders\WebsiteWordfilterSeeder;

return [
    // Necessary Atom CMS tables & seeders
    // These tables/seeders are purely used during the setup, you shouldn't touch them unless you're absolutely sure of what you're doing.
    'installation' => [
        'tables' => [
            'website_settings',
            'website_permissions',
            'website_articles',
            'website_article_comments',
            'website_article_reactions',
            'website_beta_codes',
            'website_ip_blacklist',
            'website_ip_whitelist',
            'website_languages',
            'website_open_positions',
            'website_rare_value_categories',
            'website_rare_values',
            'website_rule_categories',
            'website_rules',
            'website_staff_applications',
            'website_teams',
            'website_wordfilter',
        ],
        'seeders' => [
            WebsiteSettingsSeeder::class,
            WebsiteLanguageSeeder::class,
            WebsiteArticleSeeder::class,
            WebsitePermissionSeeder::class,
            WebsiteWordfilterSeeder::class,
            WebsiteTeamSeeder::class,
            WebsiteRuleCategorySeeder::class,
            WebsiteRuleSeeder::class
        ],
    ],
];
