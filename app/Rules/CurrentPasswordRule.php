<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!Hash::check($value, Auth::user()->password)) {
            $fail('It seems like your current password is wrong.');
        }
    }
}