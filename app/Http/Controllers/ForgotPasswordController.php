<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Mail;
use Carbon\Carbon;

use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function __invoke() {
        return view('auth.passwords.forget');
    }

    public function submitForgetPassword(Request $request) {
        $request->validate([
            'mail' => 'required|email',
        ]);

        // Do not tell the user that this email does not exist to prevent possible attacks
        if (User::where('mail', $request->mail)->exists()) {
            // Is an random string enough?
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->mail,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request) {
                $message->to($request->mail);
                $message->subject('Reset Password');
            });
        }

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetPassword(Request $request, string $token) {
        if (!DB::table('password_reset_tokens')->where('token', $token)->exists()) {
            return to_route('forgot.password.get')->withErrors('message', 'This token is expired!');
        }

        return view('auth.passwords.reset', [
            'token' => $token,
        ]);
    }

    public function submitResetPassword(Request $request, string $token) {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $passwordReset = DB::table('password_reset_tokens')->where('token', $token)->first();
        if ($passwordReset === null) {
            return to_route('forgot.password.get')->withErrors('message', 'This token is expired!');
        }

        $hashed = Hash::make($request->password);
        $user = User::where('mail', $passwordReset->email)->first();
        $user->password = $hashed;
        $user->save();

        DB::table('password_reset_tokens')->where('token', $token)->delete();

        return to_route('login')->with('success', 'Your password has been successfully reset!');
    }
}
