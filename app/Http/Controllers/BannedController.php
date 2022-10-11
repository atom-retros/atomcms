<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Support\Facades\Auth;

class BannedController extends Controller
{
    public function __invoke()
    {
        $ipBan = Ban::where('ip', '=', request()->ip())
            ->where('ban_expire', '>', time())
            ->orderByDesc('id')
            ->first();

        return view('banned', [
            'ban' => $ipBan ?? Auth::user()->ban
        ]);
    }
}
