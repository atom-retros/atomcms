<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'regex:/^[a-zA-Z1-9]+$/u', 'max:25', Rule::unique('users')],
            'mail' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'terms' => ['required', 'accepted'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}