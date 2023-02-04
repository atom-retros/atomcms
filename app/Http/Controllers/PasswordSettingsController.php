<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordSettingsFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordSettingsController extends Controller
{
    public function edit(): View
    {
        return view('user.settings.password', [
            'user' => Auth::user(),
        ]);
    }

    public function update(PasswordSettingsFormRequest $request): RedirectResponse
    {
        $request->validated();

        Auth::user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('success', __('Your password has been changed!'));
    }
}
