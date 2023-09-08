<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserCurrency;

class UserObserver
{
    public function created(User $user): void
    {
        $user->settings()->create([
            'last_hc_payday' => setting('give_hc_on_register') == '1' ? now()->addYears(10)->unix() : 0,
        ]);

        if (setting('give_hc_on_register') == '1') {
            $user->hcSubscription()->insert([
                'user_id' => $user->id,
                'subscription_type' => 'HABBO_CLUB',
                'timestamp_start' => now()->unix(),
                'duration' => (int) setting('hc_on_register_duration'),
                'active' => 1,
            ]);
        }

        UserCurrency::insert([
            [
                'user_id' => $user->id,
                'type' => 0,
                'amount' => setting('start_duckets'),
            ],
            [
                'user_id' => $user->id,
                'type' => 5,
                'amount' => setting('start_diamonds'),
            ],
            [
                'user_id' => $user->id,
                'type' => 101,
                'amount' => setting('start_points'),
            ],
        ]);
    }
}
