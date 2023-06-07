<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function __invoke(Room $room): View
    {
        return view('room.index', [
            'room' => $room,
            'owner' => User::where('id', $room->owner_id)->first()
        ]);
    }
}