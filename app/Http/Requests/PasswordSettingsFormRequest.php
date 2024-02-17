<?php

namespace App\Http\Requests;

use App\Actions\Fortify\Rules\PasswordValidationRules;
use App\Rules\CurrentPasswordRule;
use App\Rules\GoogleRecaptchaRule;
use App\Rules\TurnstileCheck;
use Illuminate\Foundation\Http\FormRequest;

class PasswordSettingsFormRequest extends FormRequest
{
    use PasswordValidationRules;

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', new CurrentPasswordRule],
            'password' => $this->passwordRules(),
            'g-recaptcha-response' => [new GoogleRecaptchaRule()],
            'cf-turnstile-response' => [new TurnstileCheck()],
        ];
    }
}
