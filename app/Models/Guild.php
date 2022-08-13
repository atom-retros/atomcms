<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guild extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function members(): HasMany
    {
        return $this->hasMany(GuildMember::class);
    }
}