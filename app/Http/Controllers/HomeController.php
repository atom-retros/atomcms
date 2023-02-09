<?php

namespace App\Http\Controllers;

use App\Models\CameraWeb;
use App\Models\WebsiteArticle;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('index', [
            'articles' => WebsiteArticle::latest('id')
                ->take(4)
                ->has('user')
                ->with('user:id,username,look')
                ->get(),
            'photos' => CameraWeb::latest('id')
                ->take(8)
                ->with('user:id,username,look')
                ->get(),
        ]);
    }
}
