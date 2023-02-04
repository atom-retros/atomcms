<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TwoFactorAuthenticationController extends Controller
{
    public function index(): Response
    {
        return view('user.settings.two-factor');
    }

    public function verify(Request $request): Response
    {
        $confirmed = $request->user()->confirmTwoFactorAuthentication($request->input('code'));

        if (! $confirmed) {
            return back()->withErrors('Invalid Two Factor Authentication code');
        }

        return back();
    }
}
