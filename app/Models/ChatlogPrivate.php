<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatlogPrivate extends Model
{
    use HasFactory;

    protected $table = 'chatlogs_private';

    protected $guarded = [];

    public $timestamps = false;

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }
}
