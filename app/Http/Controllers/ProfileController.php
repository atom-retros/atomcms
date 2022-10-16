<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Models\GuildMember;
use App\Models\User;
use App\Models\UserBadge;
use App\Models\MessengerFriendship;
use App\Models\Room;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $user = $user->load(['badges' => function ($badges) {
            $badges->where('slot_id', '>', '0')
                ->orderBy('slot_id')
                ->take(5)
                ->get();
        },
        'rooms' => function ($rooms) {
            $rooms->select('id', 'owner_id', 'name', 'users')
                ->orderByDesc('users')
                ->orderBy('id')
                ->take(4)
                ->get();
        }]);

        $friends = MessengerFriendship::select('user_two_id')
            ->where('user_one_id', '=', $user->id)
            ->whereHas('user')
            ->take(12)
            ->inRandomOrder()
            ->with('user:id,username,look')
            ->get();

        $groups = GuildMember::select(['guilds_members.id', 'guilds_members.guild_id', 'guilds_members.user_id', 'guilds.name', 'guilds.badge'])
            ->where('guilds_members.user_id', '=', $user->id)
            ->join('guilds', 'guilds_members.guild_id', '=', 'guilds.id')
            ->take(6)
            ->inRandomOrder()
            ->get();

        return view('user.profile', [
            'user' => $user,
            'friends' => $friends,
            'groups' => $groups,
        ]);
    }
}
