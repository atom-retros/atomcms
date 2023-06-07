<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    protected $guarded = ['id'];

    public function guild(): HasOne
    {
        return $this->hasOne(Guild::class, 'room_id');
    }
}
