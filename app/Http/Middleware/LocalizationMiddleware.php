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

$countryCode = strtolower(isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
if (WebsiteLanguage::where('country_code', '=', $countryCode)->doesntExist()) {
    $defaultLocale = env('APP_LOCALE', 'en');
    App::setLocale($defaultLocale);
    Session::put('locale', $defaultLocale);
    
    return $next($request);
}

App::setLocale($countryCode);
Session::put('locale', $countryCode);

        return $next($request);
    }
}
