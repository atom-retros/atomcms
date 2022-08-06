<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsFormRequest;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function edit()
    {
        return view('user.settings.account', [
            'user' => Auth::user(),
        ]);
    }

    public function update(AccountSettingsFormRequest $request)
    {
        Auth::user()->update($request->validated());

        return redirect()->back()->with('success', __('Your account settings has been updated'));
    }
}