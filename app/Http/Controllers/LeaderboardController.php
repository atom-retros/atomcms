<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCurrency;
use App\Models\UserSetting;

class LeaderboardController extends Controller
{
    public function __invoke()
    {
        $duckets = UserCurrency::query()
            ->where('type', 0)
            ->orderByDesc('amount')
            ->take(9)
            ->with(['user:id,username,look'])
            ->get();

        $diamonds = UserCurrency::query()
            ->where('type', 5)
            ->orderByDesc('amount')
            ->take(9)
            ->with(['user:id,username,look'])
            ->get();


        $mostOnline = UserSetting::query()
            ->select('user_id', 'online_time')
            ->orderByDesc('online_time')
            ->take(9)
            ->with('user:id,username,look')
            ->get();

        $respectsReceived = UserSetting::query()
            ->select('user_id', 'respects_received')
            ->orderByDesc('respects_received')
            ->take(9)
            ->with('user:id,username,look')
            ->get();

        $achievementScores = UserSetting::query()
            ->select('user_id', 'achievement_score')
            ->orderByDesc('achievement_score')
            ->take(9)
            ->with('user:id,username,look')
            ->get();

        return view('leaderboard', [
            'credits' => User::query()->orderByDesc('credits')->take(9)->get(),
            'duckets' => $duckets,
            'diamonds' => $diamonds,
            'mostOnline' => $mostOnline,
            'respectsReceived' => $respectsReceived,
            'achievementScores' => $achievementScores,
        ]);
    }
}
