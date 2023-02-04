<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Http\Request;
use Qirolab\Theme\Theme;

class SetThemeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (setting('theme') !== '') {
            Theme::set(setting('theme'));
        }

        return $next($request);
    }
}
