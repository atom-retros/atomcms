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
}