<?php

namespace App\Http\Controllers;

use App\Models\CameraWeb;
use Illuminate\View\View;

class PhotosController extends Controller
{
    public function __invoke(): View
    {
        return view('community.photos', [
            'photos' => CameraWeb::latest('id')->with('user:id,username,look')->paginate(8),
        ]);
    }
}
