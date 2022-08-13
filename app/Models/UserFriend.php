<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFriend extends Model
{
    protected $table = 'messenger_friendships';
    protected $primaryKey = 'user_two_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
