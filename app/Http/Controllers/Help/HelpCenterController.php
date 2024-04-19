<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use App\Models\Help\WebsiteHelpCenterCategory;

class HelpCenterController extends Controller
{
    public function __invoke()
    {
        return view('help-center.index', [
            'categories' => WebsiteHelpCenterCategory::orderBy('position')->get(),
        ]);
    }
}
