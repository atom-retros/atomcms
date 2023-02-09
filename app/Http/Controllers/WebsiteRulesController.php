<?php

namespace App\Http\Controllers;

use App\Models\WebsiteRuleCategory;
use Illuminate\View\View;

class WebsiteRulesController extends Controller
{
    public function __invoke(): View
    {
        return view('rules', [
            'categories' => WebsiteRuleCategory::with('rules')->get(),
        ]);
    }
}
