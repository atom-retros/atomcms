<?php

namespace App\Http\Controllers;

use App\Models\WebsiteRuleCategory;

class WebsiteRulesController extends Controller
{
    public function __invoke()
    {
        return view('rules', [
            'categories' => WebsiteRuleCategory::with('rules')->get(),
        ]);
    }
}
