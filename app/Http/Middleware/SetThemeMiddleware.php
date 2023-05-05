<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Qirolab\Theme\Theme;
use Symfony\Component\HttpFoundation\Response;

class SetThemeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (setting('theme') === '' || setting('theme' === '1')) {
            Theme::set('atom');
        } else {
            Theme::set(setting('theme'));
        }

        return $next($request);
    }
}
