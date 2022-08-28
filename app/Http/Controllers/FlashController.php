<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FlashController extends Controller
{
    public function __invoke()
    {
        return view('client.flash', [
            'sso' => Auth::user()->ssoTicket()
        ]);
    }
}