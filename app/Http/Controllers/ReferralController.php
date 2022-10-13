<?php

namespace App\Http\Controllers;

use App\Services\RconService;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function __invoke(RconService $rcon)
    {
        $user = Auth::user();
        if (!$user->referrals || $user->referrals->referrals_total < setting('referrals_needed')) {
            return redirect()->back()->withErrors([
                'message' => __('You do not have enough referrals to claim your reward'),
            ]);
        }

        // Decrease the total amount of referrals with the amount needed to claim reward
        $user->referrals->decrement('referrals_total', setting('referrals_needed'));

        $rcon->giveDiamonds($user, setting('referral_reward_amount'));

        // Log the claim
        $user->claimedReferralLog()->create([
            'ip_address' => request()->ip(),
        ]);

        return redirect()->back()->with('success', __('Woah! You have successfully claimed your reward - Keep up the good work!'));
    }
}