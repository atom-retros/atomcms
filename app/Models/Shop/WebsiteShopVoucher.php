<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class WebsiteShopVoucher extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
