<?php

namespace App\Http\Middleware;

use App\Models\Ban;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $visitorIp = $request->ip();
        $ipBan = Ban::where('ip', '=', $visitorIp)
            ->where('ban_expire', '>', time())
            ->orderByDesc('id')
            ->exists();
        $authenticated = Auth::check();

        if (!$authenticated) {
            // If visitor tries to visit ban page while not being logged in and without being banned, send them "login" page
            if ($request->is('banned') && !$ipBan) {
                return to_route('login');
            }

            // If not banned and not logged in, send user to original request
            if (!$request->is('banned') && !$ipBan) {
                return $next($request);
            }
        }

        // If ip is banned send them to ban page
        if (!$request->is('banned') && $ipBan) {
            return to_route('banned.show');
        }

        if ($authenticated) {
            $accountBan = $request->user()?->ban;

            // If user is banned send them to ban page
            if (!$request->is('banned')  && $accountBan) {
                return to_route('banned.show');
            }

            // If visitor tries to visit ban page while being logged in and without being banned, send them "me" page
            if ($request->is('banned') && (!$ipBan && !$accountBan)) {
                return to_route('me.show');
            }
        }

        return $next($request);
    }
}
