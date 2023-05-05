<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ban extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

     public function staffid(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_staff_id', 'id');
    }
}

