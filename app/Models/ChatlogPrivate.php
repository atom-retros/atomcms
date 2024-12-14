<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatlogPrivate extends Model
{
    use HasFactory;

    protected $table = 'chatlogs_private';

    protected $guarded = [];

    public $timestamps = false;

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }
}
