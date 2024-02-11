<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestbookFormRequest;
use App\Models\User;
use App\Models\WebsiteUserGuestbook;
use App\Models\WebsiteWordfilter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GuestbookController extends Controller
{
    public function store(User $user, GuestbookFormRequest $request)
    {
        if ($user->id === $request->user()->id) {
            return redirect()->back()->withErrors([
                'message' => __('You cannot post a message on your own profile.')
            ]);
        }

        $maxAllowedPostCount = !empty(setting('max_guestbook_posts_per_profile')) ? (int)setting('max_guestbook_posts_per_profile') : 3;
        if ($user->profileGuestbook()->where('user_id', $request->user()->id)->count() >= $maxAllowedPostCount) {
            return redirect()->back()->withErrors([
                'message' => __('You have already posted :count messages on this profile.', ['count' => $maxAllowedPostCount])
            ]);
        }

        $websiteFilter = WebsiteWordfilter::get()->pluck('word')->toArray();
        if (Str::contains($request->input('message'), $websiteFilter)) {
            return redirect()->back()->withErrors([
                'message' => __('Your message contains a word that is not allowed.')
            ]);
        }

        $user->profileGuestbook()->create([
            'user_id' => $request->user()->id,
            'message' => $request->input('message')
        ]);

        return redirect()->back()->with('success', __('Your message has been posted.'));
    }

    public function destroy(User $user, WebsiteUserGuestbook $guestbook)
    {
        if ($guestbook->user_id !== Auth::id() && $guestbook->profile_id !== $user->id && Auth::user()->rank < (int)setting('min_staff_rank')) {
            return redirect()->back()->withErrors([
                'message' => __('You cannot delete this message.')
            ]);
        }

        $guestbook->delete();

        return redirect()->back()->with('success', __('Your message has been deleted.'));
    }
}
