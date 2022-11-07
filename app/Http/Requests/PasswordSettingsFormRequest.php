<?php

namespace App\Http\Requests;

use App\Actions\Fortify\Rules\PasswordValidationRules;
use App\Rules\CurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordSettingsFormRequest extends FormRequest
{
    use PasswordValidationRules;

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', new CurrentPasswordRule],
            'password' => $this->passwordRules(),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}