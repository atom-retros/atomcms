<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Expr\Cast\Bool_;

class WebsiteShopProduct extends Model
{
    protected $guarded = ['id'];

    public function features(): HasOne
    {
        return $this->hasOne(WebsiteShopProductFeature::class, 'shop_product_id');
    }

    public function price(): int
    {
        $salePercentage = $this->percentage_off;
        $price = $this->price;

        if (!$this->isOnSale()) {
            return $price;
        }

        $total = $this->price - ceil(($price * $salePercentage) / 100);

        return $total > 0 ? $total : 1; // Return the sales price
    }

    public function isOnSale(): bool
    {
        return $this->percentage_off && (now()->greaterThanOrEqualTo($this->sale_start) && now()->lessThan($this->sale_end));
    }
}