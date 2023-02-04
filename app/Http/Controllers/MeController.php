<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeController extends Controller
{
    public function __invoke(): View
    {
        $user = Auth::user();

        return view('user.me', [
            'onlineFriends' => $user->getOnlineFriends(),
            'user' => $user->load('permission:id,rank_name'),
            'articles' => WebsiteArticle::latest()->with('user:id,username,look')->take(5)->get(),
        ]);
    }
}
