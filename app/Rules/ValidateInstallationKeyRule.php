<?php

namespace App\Rules;

use App\Models\WebsiteInstallation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateInstallationKeyRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value !== WebsiteInstallation::first()->installation_key) {
            $fail('The :attribute does not match');
        }
    }
}
