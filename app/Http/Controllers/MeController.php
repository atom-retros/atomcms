<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function show()
    {
        return view('user.me', [
            'user' => Auth::user()->load('permission:id,rank_name'),
        ]);
    }
}