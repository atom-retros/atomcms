<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebsiteArticle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WebsiteArticleSeeder extends Seeder
{
    public function run()
    {
        if (User::count() === 0) {
            User::factory()->create();
        }

        $title = 'Atom CMS has been installed';
        $slug = Str::slug($title);

        WebsiteArticle::firstOrCreate(['slug' => $slug], [
            'slug' => $slug,
            'title' => $title,
            'short_story' => 'Welcome to your new hotel, we are super happy that you chose to use Atom CMS!',
            'full_story' => sprintf('<strong>Welcome to your new hotel</strong>!<br><br>First of all thank you for using Atom CMS - it truly means a lot❤️<br><br>We built Atom CMS for you and your users to get the best possible experience when it comes to visiting %s, and we hope the journey has been a pleasure for you so far.<br><br>We have used modern and industry approved technologies (Laravel & Tailwind CSS) in order to give you the most secure & robust CMS possible.<br><br>Our idea of a good CMS is <strong>accessibility</strong> and just that, is what we have tried to make Atom CMS, so that you can be able to customise it without being a PHP expert or frontend guru. <br/><br/><strong>Some of the built in features</strong><br/>Atom CMS comes packed with tons of features, we will however only mention a few that might help to improve your hotel further!<br/><ul><li>- <a style="color: #42b0f5; text-decoration: underline;" href="https://retros.guide/docs/atom-cms/vpn-block" target="_blank">VPN / IP manager</a> - Allows you to whitelist & blacklist specific IPs or ASNs</li><li>- <a style="color: #42b0f5; text-decoration: underline;" href="https://retros.guide/docs/atom-cms/themes" target="_blank">Theme system</a> - Switch between themes easily or built your own with the simplicity of running a single command!</li><li>- <a style="color: #42b0f5; text-decoration: underline;" href="https://retros.guide/docs/atom-cms/recaptcha" target="_blank">Google ReCaptcha</a> - Keep bots away from your site, by simply enabling Googles recaptcha</li><li>- Built in <a style="color: #42b0f5; text-decoration: underline;" href="https://retros.guide/docs/atom-cms/language" target="_blank">multi language support</a> - Allow your users to browse your site in their preferred language</li></ul><br/><strong>Built in theme system!</strong><br/> Atom CMS has its own theme system, making it an absolute breeze to brew up a new theme or switch themes between the existing ones. If you wish to build your own theme, but is a bit unsure how to start, then head over to the <a style="color: #42b0f5; text-decoration: underline;" href="https://retros.guide/docs/atom-cms/themes" target="__blank">Our documentation site</a>. It gives you a good idea on how to use the theming system and tons of other aspects of running your hotel✨<br><br>With everything being said it is time to wrap up the introduction, but before we do that we want to <strong>wish you the best of luck with your hotel</strong>!', setting('hotel_name'), setting('hotel_name')),
            'user_id' => User::first()->id,
            'image' => 'https://i.imgur.com/uGLDOUu.png',
        ]);
    }
}
