<?php

namespace App\Http\Controllers;

use Atom\Core\Models\CameraWeb;
use Atom\Core\Models\WebsiteArticle;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return view('dusk.views.register', [
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
