<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\TwoFactorAuthenticatable;

class RedirectIfTwoFactorConfirmed extends RedirectIfTwoFactorAuthenticatable
{
    public function handle($request, $next)
    {
        $user = $this->validateCredentials($request);

        if (optional($user)->two_factor_confirmed && in_array(TwoFactorAuthenticatable::class, class_uses_recursive($user))) {
            return $this->twoFactorChallengeResponse($request, $user);
        }

        return $next($request);
    }
}