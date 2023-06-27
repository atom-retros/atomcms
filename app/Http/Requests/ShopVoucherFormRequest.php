<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopVoucherFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string']
        ];
    }
}
