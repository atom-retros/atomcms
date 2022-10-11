<?php

namespace App\Http\Controllers;

use App\Models\UserCurrency;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    // Claim referral reward
    public function __invoke()
    {
        $user = Auth::user();
        if (!$user->referrals || $user->referrals->referrals_total < setting('referrals_needed')) {
            return redirect()->back()->withErrors([
                'message' => __('You do not have enough referrals to claim your reward'),
            ]);
        }

        // TODO: Replace with RCON
        if ($user->online) {
            return to_route('me.index')->withErrors([
                'message' => __('Please logout to claim your reward'),
            ]);
        }

        // Decrease the total amount of referrals with the amount needed to claim reward
        $user->referrals->decrement('referrals_total', setting('referrals_needed'));

        // Reward the user x diamonds
        UserCurrency::where('user_id', $user->id)->where('type', '=', 5)->increment('amount', setting('referral_reward_amount'));

        // Log the claim
        $user->claimedReferralLog()->create([
            'ip_address' => request()->ip(),
        ]);

        return redirect()->back()->with('success', __('Woah! You have successfully claimed your reward - Keep up the good work!'));
    }
}