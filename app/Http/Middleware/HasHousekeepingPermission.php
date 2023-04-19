<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasHousekeepingPermission
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        if (!hasPermission($permission)) {
            abort(403, __('You do not have permission to visit this part of the housekeeping'));
        }

        return $next($request);
    }
}
