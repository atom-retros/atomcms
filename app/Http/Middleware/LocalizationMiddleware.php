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

            return $next($request);
        }

        $countryCode = env('APP_LOCALE', 'en');
        if (isset($_SERVER["HTTP_CF_IPCOUNTRY"])) {
            $countryCode = strtolower($_SERVER["HTTP_CF_IPCOUNTRY"]);
        } else if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $countryCode = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
        }

        // If the language does not exist in the database
        if (WebsiteLanguage::where('country_code', '=', $countryCode)->doesntExist()) {
            App::setLocale($countryCode);
            Session::put('locale', $countryCode);
            
            return $next($request);
        }

        App::setLocale($countryCode);
        Session::put('locale', $countryCode);

        return $next($request);
    }
}
