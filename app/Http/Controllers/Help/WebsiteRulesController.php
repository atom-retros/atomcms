<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use App\Models\Help\WebsiteRuleCategory;
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
