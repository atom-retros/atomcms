<?php

namespace App\Http\Controllers;

use App\Enums\RoomEventTypes;
use App\Models\EventEntry;
use App\Models\EventWinner;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(RoomEventTypes $eventType)
    {
        $entries = EventEntry::where('type', '=', $eventType)->with('room')->get();
        $currentWinners = EventWinner::select('id', 'user_id', 'entry_id')
            ->where('type', '=', $eventType)
            ->with(['user:id,username,rank,look', 'entry.room'])
            ->take(3)
            ->get();

        $rooms = Room::query()
            ->select('id', 'name', 'description', 'state')
            ->where('owner_id', '=', Auth::id())
            ->get();

        $view = match ($eventType) {
            'rotw' => 'rotw',
            'cotw' => 'cotw',

            default => 'rotw'
        };

        return view('events.' . $view, [
            'rooms' => $rooms,
            'entries' => $entries,
            'currentWinners' => $currentWinners
        ]);
    }

    public function store(Request $request, RoomEventTypes $eventType): RedirectResponse
    {
        if ($eventType === 'rotw' && Auth::user()->rotwEntry()->exists()) {
            return redirect()->back()->withErrors(__('You can only submit one ROTW room per week.'));
        } elseif ($eventType === 'cotw' && Auth::user()->cotwEntry()->exists()) {
            return redirect()->back()->withErrors(__('You can only submit one COTW room per week.'));
        }

        $isRoomOwner = Auth::user()
            ->rooms()
            ->where('id', '=', $request->input('room_id'))
            ->exists();

        if (!$isRoomOwner) {
            return redirect()->back()->withErrors(__('The room you tried to submit does not belong to you'));
        }

        Auth::user()->eventEntry()->create([
            'room_id' => $request['room_id'],
            'type' => $eventType->value
        ]);

        return redirect()
            ->back()
            ->with('success', __('You have successfully submitted your room to this weeks :TYPE', ['type' => $eventType->value]));
    }

    public function deleteSubmissions(RoomEventTypes $eventType): string|RedirectResponse
    {
        if (!permission('min_rank_to_delete_event_submissions')) {
            return redirect()->back()->withErrors(__('You do not have permission to delete event submissions'));
        }

        EventEntry::query()
            ->where('type', '=', $eventType)
            ->delete();

        return redirect()
            ->back()
            ->with('success', __('All :TYPE submissions has been deleted', ['type' => $eventType->value]));
    }

    public function submitWinners(Request $request, RoomEventTypes $eventType): RedirectResponse
    {

        if (!permission('min_rank_to_submit_event_winners')) {
            return redirect()->back()->withErrors(__('You do not have permissions submit winners.'));
        }

        $winners = explode(',', $request->input('winners'));

        $rooms = [];

        foreach ($winners as $roomId) {
            $room = Room::query()
                ->select('id', 'owner_id')
                ->where('id', $roomId)
                ->first();

            $rooms[] = $room?->toArray();
        }

        if (empty(array_filter($rooms))) {
            return redirect()
                ->back()
                ->withErrors(__('The submitted rooms does not exist.'));
        }

        EventWinner::where('type', $eventType)->delete();

        foreach ($rooms as $room) {
            if (empty($room)) {
                continue;
            }

            $entry = EventEntry::select('id')->where('type', $eventType)->where('user_id', $room['owner_id'])->where('is_active', true)->first();

            EventWinner::create([
                'user_id' => $room['owner_id'],
                'entry_id' => $entry->id,
                'type' => $eventType->value
            ]);
        }

        return redirect()->back()->with('success', __('The :TYPE winners has been submitted!', ['type' => $eventType->value]));
    }

    public function resetWinners(RoomEventTypes $eventType): RedirectResponse
    {
        if (!permission('min_rank_to_reset_event_entries')) {
            return redirect()->back()->withErrors(__('You do not have permissions to reset the winners.'));
        }

        EventWinner::query()
            ->select('id')
            ->whereType($eventType)
            ->delete();

        return redirect()
            ->back()
            ->with('success', __('The current :TYPE winners has been reset', ['type' => $eventType->value]));
    }

    public function deleteSubmission(EventEntry $entry): RedirectResponse
    {
        if (Auth::id() !== $entry->user_id) {
            return redirect()->back()->withErrors(__('You can only delete your own submissions.'));
        }

        $entry->delete();

        return redirect()
            ->back()
            ->with('success', __('You have deleted this weeks submission'));
    }
}