<?php

namespace App\Http\Controllers;

use App\Models\CameraWeb;
use App\Models\WebsiteArticle;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('index', [
            'articles' => WebsiteArticle::query()->latest('id')->take(4)->with('user:id,username,look')->get(),
            'photos' => CameraWeb::query()->latest('id')->take(8)->with('user:id,username,look')->get(),
        ]);
    }
}