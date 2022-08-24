<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsFormRequest;
use App\Services\RconService;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function edit()
    {
        return view('user.settings.account', [
            'user' => Auth::user()->load('settings'),
        ]);
    }

    public function update(RconService $rcon, AccountSettingsFormRequest $request)
    {
        $user = Auth::user();

        if ($user->online && ($user->settings->allow_name_change && $user->username !== $request->input('username'))) {
            $rcon->disconnectUser($user);
            sleep(2);
        }

        if ($user->settings->allow_name_change) {
            $user->update([
                'mail' => $request->input('mail'),
                'username' => $request->input('username'),
            ]);
        } else {
            $user->update([
                'mail' => $request->input('mail'),
            ]);
        }

        if ($user->motto !== $request->input('motto')) {
            $rcon->setMotto($user, $request->input('motto'));
        }

        return redirect()->back()->with('success', __('Your account settings has been updated'));
    }
}