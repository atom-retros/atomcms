<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.profile', [
            'user' => $user,
        ]);
    }
}