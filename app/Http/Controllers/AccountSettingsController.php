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
            'user' => Auth::user(),
        ]);
    }

    public function update(RconService $rcon, AccountSettingsFormRequest $request)
    {
        $request->validated();

        $user = Auth::user();
        if ($user->online && $user->username !== $request->input('username')) {
            $rcon->disconnectUser($user);
            sleep(2);
        }

        Auth::user()->update($request->except('motto'));

        if ($user->motto !== $request->input('motto')) {
            $rcon->setMotto($user, $request->input('motto'));
        }

        return redirect()->back()->with('success', __('Your account settings has been updated'));
    }
}