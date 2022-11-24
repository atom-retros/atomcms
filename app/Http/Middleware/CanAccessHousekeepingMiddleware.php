<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanAccessHousekeepingMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!hasPermission('housekeeping_access')) {
            return to_route('me.show');
        }

        return $next($request);
    }
}