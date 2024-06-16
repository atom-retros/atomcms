<?php

namespace App\Http\Controllers\Miscellaneous;

use App\Http\Controllers\Controller;
use App\Models\Miscellaneous\WebsiteLanguage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function __invoke(string $locale): RedirectResponse
    {
        if (! WebsiteLanguage::where('country_code', $locale)->exists()) {
            return redirect()->back()->withErrors(['message' => __('The language selected is not supported')]);
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
