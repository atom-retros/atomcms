<?php

namespace App\Http\Controllers;

use App\Models\WebsiteRule;
use App\Models\WebsiteRuleCategory;
use Illuminate\Http\Request;

class WebsiteRulesController extends Controller
{
    public function __invoke()
    {
        return view('rules', [
            'categories' => WebsiteRuleCategory::with('rules')->get(),
        ]);
    }
}