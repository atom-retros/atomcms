<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Miscellaneous\CameraWeb;
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
