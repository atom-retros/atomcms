<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Models\UserCurrency;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterFormRequest $request)
    {
        $request->validated();

        // Register & login user
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
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
