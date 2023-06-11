<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class WebsiteShopArticles extends Model
{
    protected $guarded = ['id'];

    public function furniItems(): Collection {
        if (!$this->furniture) {
            return collect();
        }

        $furniture = json_decode($this->furniture, true);
        $furnitureIds = array_column($furniture, 'item_id');

        return ItemBase::whereIn('id', $furnitureIds)->get();
    }
}
