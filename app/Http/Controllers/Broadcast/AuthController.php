<?php

namespace App\Http\Controllers\Broadcast;

use Atom\Core\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::firstWhere('auth_ticket', $request->bearerToken());

        abort_if(!$user, 403);

        Auth::login($user);

        return Broadcast::auth($request);
    }
}
