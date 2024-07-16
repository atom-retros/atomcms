<?php

namespace App\Http\Controllers;

use Atom\Core\Models\CameraWeb;
use Atom\Core\Models\WebsiteArticle;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __invoke(): View
    {
        return view('dusk.views.index', [
            'articles' => WebsiteArticle::latest('id')
                ->take(4)
                ->has('user')
                ->with('user:id,username,look')
                ->get(),
            'photos' => CameraWeb::latest('id')
                ->take(4)
                ->with('user:id,username,look')
                ->get(),
        ]);
    }
}
