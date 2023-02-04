<?php

namespace App\Rules;

use Closure;
use App\Models\WebsiteBetaCode;
use Illuminate\Contracts\Validation\InvokableRule;

class BetaCodeRule implements InvokableRule
{
    public function __invoke(string $attribute, mixed $value, Closure $fail)
    {
        if (setting('requires_beta_code') && WebsiteBetaCode::whereCode($value)->whereNull('user_id')->doesntExist()) {
            $fail(__('The beta code is invalid.'));
        }
    }
}
