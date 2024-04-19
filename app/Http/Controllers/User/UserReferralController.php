<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserReferralController extends Controller
{
    public function __invoke(string $referralCode)
    {
        User::where('referral_code', '=', $referralCode)->firstOrFail();

        return view('auth.register', [
            'referral_code' => $referralCode,
        ]);
    }
}
