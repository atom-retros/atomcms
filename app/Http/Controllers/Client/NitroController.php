<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NitroController extends Controller
{
    public function __invoke(): View
    {
        Auth::user()->update([
            'ip_current' => request()->ip(),
        ]);

        return view('client.nitro', [
            'sso' => Auth::user()->ssoTicket(),
        ]);
    }
}
