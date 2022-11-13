<?php

namespace App\Rules;

use App\Models\WebsiteWordfilter;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Str;

class WebsiteWordfilterRule implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        $words = WebsiteWordfilter::get()
            ->pluck('word')
            ->toArray();

        if (setting('website_wordfilter_enabled') === '1' && in_array(strtolower($value), $words) || Str::contains(strtolower($value), $words)) {
            $fail(__('The entered username is not allowed on :hotel', ['hotel' => setting('hotel_name')]));
        }
    }
}