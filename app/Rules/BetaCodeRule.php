<?php

namespace App\Rules;

use App\Models\WebsiteBetaCode;
use Illuminate\Contracts\Validation\InvokableRule;

class BetaCodeRule implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (setting('requires_beta_code') && WebsiteBetaCode::whereCode($value)->whereNull('user_id')->doesntExist()) {
            $fail(__('The beta code is invalid.'));
        }
    }
}