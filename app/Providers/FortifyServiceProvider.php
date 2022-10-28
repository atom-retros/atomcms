<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\LoginFormRequest;
use App\Models\CameraWeb;
use App\Models\User;
use App\Models\WebsiteArticle;
use App\Rules\GoogleRecaptchaRule;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->input('username').$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            return view('auth.login', [
                'articles' => WebsiteArticle::latest('id')
                    ->take(4)
                    ->has('user')
                    ->with('user:id,username,look')
                    ->get(),
                'photos' => CameraWeb::latest('id')
                    ->take(8)
                    ->has('user')
                    ->with('user:id,username,look')
                    ->get(),
            ]);
        });

        Fortify::registerView(function (Request $request) {
            return view('auth.register', [
                'referral_code' => $request->route('referral_code'),
            ]);
        });

        $this->authenticate();
    }

    private function authenticate()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $input = $this->validate($request);

            $user = User::select('id', 'password', 'rank')
                ->where('username', '=', $input['username'])
                ->first();

            // Update the users password to bcrypt, if they previously used md5
            if ($user) {
                $this->convertUserPassword($user, $input['password']);
            }

            if (setting('maintenance_enabled') === '1' && setting('min_maintenance_login_rank') > $user->rank) {
                throw ValidationException::withMessages([
                    'username' => __('Only staff can login during maintenance!'),
                ]);
            }

            if (! Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
                throw ValidationException::withMessages([
                    'username' => __('auth.failed'),
                ])->errorBag('login');
            }

            Auth::user()->update([
                'ip_current' => $request->ip(),
            ]);
        });
    }

    private function convertUserPassword(User $user, string $password)
    {
        if(config('habbo.site.convert_passwords') && ($user && $user->password == md5($password))) {
            $user->update([
                'password' => Hash::make($password),
            ]);
        }
    }

    private function validate(Request $request): array
    {
        $rules = [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['sometimes', 'string', new GoogleRecaptchaRule()],
        ];

        $messages =  [
            'g-recaptcha-response.required' => __('The Google recaptcha must be completed'),
            'g-recaptcha-response.string' => __('The google recaptcha was submitted with an invalid type'),
        ];

        return Validator::make($request->all(), $rules, $messages)->validate();
    }
}