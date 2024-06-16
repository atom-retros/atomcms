<?php

namespace App\Models\Game;

use App\Models\Game\Guild\Guild;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    protected $guarded = ['id'];

    public function guild(): HasOne
    {
        return $this->hasOne(Guild::class, 'room_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
