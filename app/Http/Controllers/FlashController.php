<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FlashController extends Controller
{
    public function __invoke(): View
    {
        Auth::user()->update([
            'ip_current' => request()->ip(),
        ]);

        return view('client.flash', [
            'sso' => Auth::user()->ssoTicket(),
        ]);
    }
}
