<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteArticle extends Model
{
    protected $guarded = ['id'];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}