<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NitroController extends Controller
{
    public function __invoke()
    {
        return view('client.nitro', [
            'sso' => Auth::user()->ssoTicket(),
        ]);
    }
}