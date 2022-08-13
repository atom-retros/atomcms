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

        $title = sprintf('Welcome to %s', setting('hotel_name'));
        WebsiteArticle::query()->upsert([
            [
                'slug' => Str::slug($title),
                'title' => $title,
                'short_story' => 'Welcome to your new hotel!',
                'full_story' => sprintf('<strong>Welcome to your new hotel</strong>!<br><br>First of all thank you for using No Name CMS - it truly means a lot❤️<br><br>We built No Name CMS to give you and your users the best possible experience when it comes to visiting %s and we hope the journey has been a pleasure for you so far.<br><br>We built No Name CMS around modern and industry approved technologies in order to give you the most robust CMS possible.<br><br>No Name CMS was made around the idea of accessibility and for you to be able to customise it without being a PHP expert or frontend guru. If you are yet to notice, the CMS comes with its <strong>own theme system</strong>! If you wish to build your own theme, then head over to the <a style="color: #42b0f5; text-decoration: underline;" href="https://github.com/ObjectRetros/atomcms" target="__blank">GitHub</a> and have a look at the readme. It gives you a good idea on how to achieve what you wish!<br><br>With everyting being said it is time to wrap up the introduction but before we do that we want to <strong>wish you the best of luck with %s</strong>!', setting('hotel_name'), setting('hotel_name')),
                'user_id' => User::first()->id,
                'image' => 'https://i.imgur.com/uGLDOUu.png',
            ]
        ], ['slug']);
    }
}
