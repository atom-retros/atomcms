<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Models\UserCurrency;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register', [
            'referral_code' => $request->route('referral_code'),
        ]);
    }

    public function store(RegisterFormRequest $request)
    {
        $request->validated();

        // Create the user & login
        Auth::login($user = User::query()->create([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => Hash::make($request->input('password')),
            'account_created' => time(),
            'last_login' => time(),
            'motto' => setting('start_motto'),
            'look' => setting('start_look'),
            'credits' => setting('start_credits'),
            'ip_register' => $request->ip(),
            'ip_current' => $request->ip(),
            'auth_ticket' => '',
        ]));

        $user->update([
            'referral_code' => sprintf('%s%s', $user->id, Str::random(5))
        ]);

        // Referral
        if ($request->has('referral_code')) {
            $referralUser = User::query()
                ->where('referral_code', '=', $request->get('referral_code'))
                ->first();

            if (is_null($referralUser)) {
                return redirect(RouteServiceProvider::HOME);
            }

            // If same IP skip referral incrementation
            if ($referralUser->ip_current == $user->ip_current || $referralUser->ip_register == $user->ip_register) {
                return redirect(RouteServiceProvider::HOME);
            }

            $referralUser->referrals()->updateOrCreate(['user_id' => $referralUser->id], [
                'referrals_total' => $referralUser->referrals != null ? $referralUser->referrals->referrals_total += 1 : 1,
            ]);

            $referralUser->userReferrals()->create([
                'referred_user_id' => $user->id,
                'referred_user_ip' => $request->ip(),
            ]);
        }

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
