<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Rules\GoogleRecaptchaRule;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['sometimes', 'string', new GoogleRecaptchaRule()]
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $user = User::query()
            ->select('id', 'password', 'rank')
            ->where('username', '=', $this->input('username'))
            ->first();

        // Update the users password to bcrypt, if they previously used md5
        if ($user) {
            $this->convertUserPassword($user);
        }

        if (! Auth::attempt($this->only('username', 'password'), $this->filled('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ])->errorBag('login');
        }

        if (setting('maintenance_enabled') === '1' && setting('min_maintenance_login_rank') > $user->rank) {
            throw ValidationException::withMessages([
                'username' => __('Only staff can login during maintenance!'),
            ]);
        }

        Auth::user()->update([
            'ip_current' => $this->ip(),
        ]);

        Auth::user()->sessionLogs()->create([
            'ip' => $this->ip(),
            'browser' => $this->userAgent()
        ]);

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    private function convertUserPassword(User $user)
    {
        if(config('habbo.site.convert_passwords') && ($user && $user->password == md5($this->input('password')))) {
            $user->update([
                'password' => Hash::make($this->input('password')),
            ]);
        }
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('username')).'|'.$this->ip();
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => __('The Google recaptcha must be completed'),
            'g-recaptcha-response.string' => __('The google recaptcha was submitted with an invalid type'),
        ];
    }
}
