<?php

namespace Database\Seeders;

use App\Models\WebsiteRule;
use App\Models\WebsiteRuleCategory;
use Illuminate\Database\Seeder;

class WebsiteRuleSeeder extends Seeder
{
    public function run()
    {
        $categories = WebsiteRuleCategory::all()->pluck('id');

        $rules = [
            // General rules
            [
                'category_id' => $categories[0],
                'paragraph' => '1.1',
                'rule' => 'Do not abuse the Call for Help (CFH) system; it should be used during emergency purposes only.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.2',
                'rule' => 'Do not advertise other Habbo Retros; hotel links or purposely mentioning the name of another hotel with the intentions of advertising is not permitted.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.3',
                'rule' => 'Do not attempt to or scam credits or furniture from other users through betting, gaming, or trading.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.4',
                'rule' => 'Do not bully, harass, or abuse other users; avoid violent or aggressive behavior.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.5',
                'rule' => 'Do not disclose any personal information of another user (e.g., address, IP Address, phone number, school, private images etc.) without their consent.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.6',
                'rule' => 'Do not excessively repeat identical or similar statements (spamming).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.7',
                'rule' => 'Users are to not participate in any sexual, inappropriate, or generally objective acts towards other users without their prior consent.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.8',
                'rule' => 'Do not make rooms with inappropriate or abusive names.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.9',
                'rule' => 'Do not attempt to or successfully harm a user’s home internet connection.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[0],
                'paragraph' => '1.10',
                'rule' => 'Do not disrupt events with explicit language or negative behavior.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Accounts rules
            [
                'category_id' => $categories[1],
                'paragraph' => '2.1',
                'rule' => 'Do not attempt to or give away, buy, sell, or trade your Habbo account and/or items for virtual items from another game, accounts from another game, cash, or vice versa without permission from an Administrator. This includes giving away, buying, selling or trading furniture/currency for Habbo furniture/currency or vice versa. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.2',
                'rule' => 'Do not create a username with an offensive name that is insulting, racist, harassing, or generally objectionable.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.3',
                'rule' => 'Do not evade an IP Address ban.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.4',
                'rule' => 'Do not share your account with other users.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.5',
                'rule' => 'Do not threaten to, attempt to, or hack other users accounts.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.6',
                'rule' => 'Do not create multiple accounts for the purpose of taking an advantage over gaining more in-game currency and/or rares of any kind.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.7',
                'rule' => 'Do not re-appeal your ban unless stated otherwise. This means if you re-appeal in 2 days after your first appeal was denied and you were told to re-appeal in 2-3 weeks, you will be banned from the forum as well as the hotel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[1],
                'paragraph' => '2.8',
                'rule' => 'Accounts are limited to 2 per person. This means, only 1 Alt acc is acceptable. Anything more than this, will result in a full account wipe including credits, and rares.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Hotel rules
            [
                'category_id' => $categories[2],
                'paragraph' => '3.1',
                'rule' => 'Do not attempt to or exploit errors of Habbo; report it to the Administration immediately.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.2',
                'rule' => 'Do not attempt to or refund your VIP Membership or donation to Habbo at any given time; all payments are final.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.3',
                'rule' => 'Do not intentionally give wrong or misleading information to staff members in reports about rule violations, complaints, bug reports, or support requests.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.4',
                'rule' => 'Do not make false statements against Habbo or any other part of its services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.5',
                'rule' => 'Do not pretend to be a representative of Habbo. This includes mimicing, acting like them, and or claim to have staff powers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.6',
                'rule' => 'Do not threaten to, attempt to, or use any scripts or third party software to enter, disrupt, or modify Habbo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories[2],
                'paragraph' => '3.7',
                'rule' => 'Non-harmful auto-typing, auto-clicking and other programs can only be used if you are the room owner or with permission from the room owner.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        if (WebsiteRule::doesntExist()) {
            WebsiteRule::insert($rules);
        }

    }
}
