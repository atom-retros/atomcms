<?php

namespace App\Models;

use Database\Factories\RareValuesFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteRareValue extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(WebsiteRareValueCategory::class, 'category_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(CatalogItem::class, 'item_id', 'item_ids');
    }

    public function isLimitedEdition(): bool
    {
        if (is_null($this->item)) {
            return false;
        }

        return $this->item->limited_stack > 0;
    }
}