<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TwoFactorAuthenticationController extends Controller
{
    public function index(): View
    {
        return view('user.settings.two-factor');
    }

    public function verify(Request $request): RedirectResponse
    {
        $confirmed = $request->user()->confirmTwoFactorAuthentication($request->input('code'));

        if (! $confirmed) {
            return back()->withErrors('Invalid Two Factor Authentication code');
        }

        return back();
    }
}
