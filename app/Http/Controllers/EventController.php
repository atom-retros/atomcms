<?php

namespace App\Http\Controllers;

use App\Models\EventEntry;
use App\Models\EventWinner;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function index($eventType)
    {
        $entries = EventEntry::query()->where('type', '=', $eventType)->get()->load('room');
        $currentWinners = EventWinner::query()
            ->with(['user:id,username,rank,look', 'room'])
            ->select('id', 'user_id', 'room_id')
            ->whereType($eventType)
            ->take(3)
            ->get();

        $rooms = Room::query()
            ->select('id', 'name', 'description', 'state')
            ->where('owner_id', '=', auth()->id())
            ->get();

        $view = match ($eventType) {
            'rotw' => 'rotw',
            'cotw' => 'cotw',

            default => 'rotw'
        };

        return view('cms.events.' . $view, [
            'group' => 'events',
            'rooms' => $rooms,
            'entries' => $entries,
            'currentWinners' => $currentWinners
        ]);
    }

    public function store(Request $request, $eventType): \Illuminate\Http\RedirectResponse
    {
        if ($eventType === 'rotw' && auth()->user()->rotwEntry()->exists()) {
            return redirect()->back()->withErrors(__('You can only submit one ROTW room per week.'));
        } elseif ($eventType === 'cotw' && auth()->user()->cotwEntry()->exists()) {
            return redirect()->back()->withErrors(__('You can only submit one COTW room per week.'));
        }

        $isRoomOwner = auth()->user()
            ->rooms()
            ->where('id', '=', $request->input('room_id'))
            ->exists();

        if (!$isRoomOwner) {
            return redirect()->back()->withErrors(__('The room you tried to submit does not belong to you'));
        }

        auth()->user()->eventEntry()->create([
            'room_id' => $request['room_id'],
            'type' => $eventType
        ]);

        return redirect()
            ->back()
            ->with('success', __('You have successfully submitted your room to this weeks :TYPE', ['type' => $eventType]));
    }

    public function deleteSubmissions($eventType): string|\Illuminate\Http\RedirectResponse
    {
        if (auth()->user()->rank < CMS::settings('min_event_management_rank')) {
            return redirect()->back()->withErrors(__('You do not have permissions to do this.'));
        }

        EventEntry::query()
            ->where('type', '=', $eventType)
            ->delete();

        return redirect()
            ->back()
            ->with('success', __('All :TYPE submissions has been deleted', ['type' => $eventType]));
    }

    public function submitWinners(Request $request, $eventType): \Illuminate\Http\RedirectResponse
    {
        if (auth()->user()->rank < CMS::settings('min_event_management_rank')) {
            return redirect()->back()->withErrors(__('You do not have permissions to do this.'));
        }

        $winners = explode(',', $request->input('winners'));

        $rooms = [];

        foreach ($winners as $winner) {
            $room = Room::query()
                ->select('id', 'owner_id')
                ->where('id', $winner)
                ->first();

            $rooms[] = $room?->toArray();
        }

        if (empty(array_filter($rooms))) {
            return redirect()
                ->back()
                ->withErrors(__('The submitted rooms does not exist.'));
        }

        foreach ($rooms as $room) {
            if (empty($room)) {
                continue;
            }

            EventWinner::create([
                'user_id' => $room['owner_id'],
                'room_id' => $room['id'],
                'type' => $eventType
            ]);
        }

        return redirect()->back()->with('success', __('The :TYPE winners has been submitted!', ['type' => $eventType]));
    }

    public function resetWinners($eventType): \Illuminate\Http\RedirectResponse
    {
        if (auth()->user()->rank < CMS::settings('min_event_management_rank')) {
            return redirect()->back()->withErrors(__('You do not have permissions to do this.'));
        }

        EventWinner::query()
            ->select('id')
            ->whereType($eventType)
            ->delete();

        return redirect()
            ->back()
            ->with('success', __('The current :TYPE winners has been reset', ['type' => $eventType]));
    }

    public function deleteSubmission($eventType): \Illuminate\Http\RedirectResponse
    {
        if (auth()->user()->rank < CMS::settings('min_event_management_rank') && auth()->user()->eventEntry()->whereType($eventType)->where('user_id', '!=', auth()->id())->latest()->first()) {
            return redirect()->back()->withErrors(__('You do not have permissions to do this.'));
        }

        auth()->user()->eventEntry()->whereType($eventType)->delete();

        return redirect()
            ->back()
            ->with('success', __('You have deleted your submission for this weeks :TYPE', ['type' => $eventType]));
    }
}