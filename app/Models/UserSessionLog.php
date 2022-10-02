<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSessionLog extends Model
{
    use HasFactory;

    protected $table = 'users_session_logs';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
