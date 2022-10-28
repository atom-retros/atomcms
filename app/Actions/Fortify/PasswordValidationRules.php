<?php

namespace App\Actions\Fortify;


use App\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
