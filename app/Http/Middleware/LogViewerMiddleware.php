<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogViewerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return to_route('login');
        }

        if (! hasPermission('view_server_logs')) {
            return to_route('me.show');
        }

        return $next($request);
    }
}
