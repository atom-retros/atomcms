<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'user' => Auth::user()->load('permission:id,rank_name'),
        ]);
    }
}