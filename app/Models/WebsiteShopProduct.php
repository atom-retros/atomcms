<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WebsiteShopProduct extends Model
{
    protected $guarded = ['id'];

    public function features(): HasOne
    {
        return $this->hasOne(WebsiteShopProductFeature::class, 'shop_product_id');
    }
}