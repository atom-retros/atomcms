<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteUsedShopVoucher extends Model
{
    protected $guarded = ['id'];

    public function used(): HasMany
    {
        return $this->hasMany(WebsiteUsedShopVoucher::class, 'voucher_id');
    }
}
