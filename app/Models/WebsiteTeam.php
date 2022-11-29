<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteTeam extends Model
{
    protected $guarded = ['id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }
}