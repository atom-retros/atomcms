<?php

namespace App\Models\Game;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'rank', 'id');
    }
}
