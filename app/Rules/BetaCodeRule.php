<?php

namespace App\Rules;

use App\Models\WebsiteBetaCode;
use Illuminate\Contracts\Validation\InvokableRule;

class BetaCodeRule implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (setting('requires_beta_code') && (WebsiteBetaCode::where('code', '=', $value)->doesntExist() || WebsiteBetaCode::where('code', '=', $value)->where('user_id', '!=', null)->exists())) {
            $fail('The beta code is invalid.');
        }
    }
}