<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsiteStaffApplications extends Model
{
    protected $guarded = ['id'];

    public function rank(): BelongsTo
    {
        return $this->belongsTo(Permission::class, 'rank_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}