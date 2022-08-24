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
            'username' => ['sometimes', 'string', sprintf('regex:%s', setting('username_regex')), 'min:3', 'max:25', Rule::unique('users')->ignore($this->user()->id)],
            'motto' => ['nullable', 'string', 'max:127'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}