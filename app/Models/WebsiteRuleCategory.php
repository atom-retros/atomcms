<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteRuleCategory extends Model
{
    protected $guarded = [];

    public function rules(): HasMany
    {
        return $this->hasMany(WebsiteRule::class, 'category_id');
    }
}
