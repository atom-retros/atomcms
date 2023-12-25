<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptchaRule;
use App\Rules\TurnstileCheck;
use Illuminate\Foundation\Http\FormRequest;

class ShopVoucherFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string'],
            'g-recaptcha-response' => [new GoogleRecaptchaRule()],
            'cf-turnstile-response' => [new TurnstileCheck()],
        ];
    }
}
