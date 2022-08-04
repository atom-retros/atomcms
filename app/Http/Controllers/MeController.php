<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function show()
    {
        return view('user.me', [
            'user' => Auth::user()->load('permission:id,rank_name'),
            'article' => WebsiteArticle::query()->latest()->with('user:id,username,look')->first(),
        ]);
    }
}