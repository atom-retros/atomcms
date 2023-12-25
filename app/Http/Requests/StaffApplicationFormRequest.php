<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptchaRule;
use App\Rules\TurnstileCheck;
use Illuminate\Foundation\Http\FormRequest;

class StaffApplicationFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'g-recaptcha-response' => [new GoogleRecaptchaRule()],
            'cf-turnstile-response' => [new TurnstileCheck()],
        ];
    }
}
