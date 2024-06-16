<?php

namespace App\Models\Community\RareValue;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteRareValueCategory extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function furniture(): HasMany
    {
        return $this->hasMany(WebsiteRareValue::class, 'category_id');
    }
}
