<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function __invoke(Room $room): View
    {
        return view('room.index', [
            'room' => $room
        ]);
    }
}