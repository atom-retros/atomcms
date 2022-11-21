<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilamentAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!config('habbo.site.filament_enabled')) {
            return to_route('me.show');
        }

        return $next($request);
    }
}