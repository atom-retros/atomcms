<?php

namespace App\Http\Controllers;

use App\Models\WebsiteHelpCenterCategory;

class HelpCenterController extends Controller
{
    public function __invoke()
    {
        return view('help-center.index', [
            'categories' => WebsiteHelpCenterCategory::orderBy('position')->get(),
        ]);
    }
}
