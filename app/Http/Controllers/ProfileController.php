<?php

namespace App\Http\Controllers;

use App\Models\GuildMember;
use App\Models\MessengerFriendship;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(User $user): View
    {
        $user = $this->loadUserRelations($user);

        $friends = $this->getUserFriends($user->id);
        $groups = $this->getUserGroups($user->id);

        return view('user.profile', [
            'user' => $user,
            'friends' => $friends,
            'groups' => $groups,
        ]);
    }

    private function loadUserRelations(User $user): User
    {
        return $user->load([
            'badges' => function ($badges) {
                $badges->where('slot_id', '>', '0')
                    ->orderBy('slot_id')
                    ->take(5);
            },
            'rooms' => function ($rooms) {
                $rooms->select('id', 'owner_id', 'name', 'users')
                    ->orderByDesc('users')
                    ->orderBy('id')
                    ->take(4);
            },
        ]);
    }

    private function getUserFriends(int $userId)
    {
        return MessengerFriendship::query()
            ->select('user_two_id')
            ->where('user_one_id', '=', $userId)
            ->whereHas('user')
            ->with('user:id,username,look')
            ->inRandomOrder()
            ->take(12)
            ->get();
    }

    private function getUserGroups(int $userId)
    {
        return GuildMember::query()
            ->select(['guilds_members.id', 'guilds_members.guild_id', 'guilds_members.user_id', 'guilds.name', 'guilds.badge'])
            ->where('guilds_members.user_id', '=', $userId)
            ->join('guilds', 'guilds_members.guild_id', '=', 'guilds.id')
            ->inRandomOrder()
            ->take(6)
            ->get();
    }
}
