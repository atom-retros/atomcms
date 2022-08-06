<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountSettingsFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mail' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'username' => ['required', 'string', 'max:25', Rule::unique('users')->ignore($this->user()->id)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}