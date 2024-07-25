<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::firstWhere('username', $request->get('username'));

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user->only('id', 'username', 'look'));
    }
}
