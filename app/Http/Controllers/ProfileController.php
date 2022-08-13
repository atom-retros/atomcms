<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBadge;
use App\Models\UserFriend;
use App\Models\Room;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $badges = UserBadge::select('badge_code')->where('user_id', $user->id)->where('slot_id', '>', '0')->orderBy('slot_id')->limit(5)->get();
        $rooms = Room::select('id', 'name', 'users')->where('owner_id', $user->id)->orderByDesc('users')->orderBy('id')->limit(4)->get();
        $friends = UserFriend::select('username', 'look')->join('users', 'messenger_friendships.user_two_id', '=', 'users.id')->where('user_two_id', $user->id)->orderByDesc('relation')->limit(8)->get();

        return view('user.profile', [
            'user' => $user,
            'badges' => $badges,
            'rooms' => $rooms,
            'friends' => $friends,
        ]);
    }
}
