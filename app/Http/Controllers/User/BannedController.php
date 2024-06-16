<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Ban;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BannedController extends Controller
{
    public function __invoke(): View
    {
        $ipBan = Ban::where('ip', '=', request()->ip())
            ->where('ban_expire', '>', time())
            ->orderByDesc('id')
            ->first();

        return view('banned', [
            'ban' => $ipBan ?? Auth::user()->ban,
        ]);
    }
}
