<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestbookFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:32'],
        ];
    }
}
