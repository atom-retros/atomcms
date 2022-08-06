<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordSettingsFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', new CurrentPasswordRule],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}