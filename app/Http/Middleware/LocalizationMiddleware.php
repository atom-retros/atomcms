<?php

namespace App\Http\Middleware;

use App\Models\WebsiteLanguage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            $country_code = strtolower(isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
            $languages = WebsiteLanguage::select('country_code')
                ->get()
                ->pluck('country_code')
                ->toArray();
            if (in_array($country_code, $languages)) {
                App::setLocale($country_code);
                Session::put('locale', $country_code);
            } else {
                $default_locale = env('APP_LOCALE', 'en');
                App::setLocale($default_locale);
                Session::put('locale', $default_locale);
            }
        }

        return $next($request);
    }
}
