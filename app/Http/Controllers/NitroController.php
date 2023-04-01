<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class NitroController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('client.nitro', [
            $request->session()->put('sso', Auth::user()->ssoTicket())
        ]);
    }
}
