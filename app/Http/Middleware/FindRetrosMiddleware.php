<?php

namespace App\Http\Middleware;

use App\Services\FindRetrosService;
use Closure;
use Illuminate\Http\Request;

/*Credits to Kani for this*/
class FindRetrosMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $findRetrosService = new FindRetrosService;

        if (!$findRetrosService->checkHasVoted() && config('habbo.findretros.enabled')) {
            return redirect($findRetrosService->getRedirectUri());
        }

        return $next($request);
    }
}
