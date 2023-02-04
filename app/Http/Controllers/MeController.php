<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\WebsiteArticle;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function show(): Response
    {
        $user = Auth::user();

        return view('user.me', [
            'onlineFriends' => $user->getOnlineFriends(),
            'user' => $user->load('permission:id,rank_name'),
            'articles' => WebsiteArticle::latest()->with('user:id,username,look')->take(5)->get(),
        ]);
    }
}
