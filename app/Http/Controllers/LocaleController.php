<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLanguage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function __invoke($locale)
    {
        $languages = WebsiteLanguage::select('country_code')
            ->get()
            ->pluck('country_code')
            ->toArray();

        if (! in_array($locale, $languages)) {
            return redirect()->back()->withErrors(['message' => __('The language selected is not supported')]);
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
}