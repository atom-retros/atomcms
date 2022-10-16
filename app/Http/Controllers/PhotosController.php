<?php

namespace App\Http\Controllers;

use App\Models\CameraWeb;

class PhotosController extends Controller
{
    public function __invoke()
    {
        return view('community.photos', [
            'photos' => CameraWeb::latest('id')->with('user:id,username,look')->paginate(8),
        ]);
    }
}