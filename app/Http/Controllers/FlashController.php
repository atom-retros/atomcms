<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FlashController extends Controller
{
    public function __invoke(): View
    {
        return view('client.flash', [
            'sso' => Auth::user()->currentUser->ssoTicket(),
        ]);
    }
}
