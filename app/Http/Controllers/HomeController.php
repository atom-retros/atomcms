<?php

namespace App\Http\Controllers;

use Atom\Core\Models\WebsiteArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $articles = WebsiteArticle::latest('id')
            ->take(5)
            ->get();

        return view('home', [
            'articles' => $articles,
            'onlineFriends' => Auth::user()?->getOnlineFriends(),
        ]);
    }
}
