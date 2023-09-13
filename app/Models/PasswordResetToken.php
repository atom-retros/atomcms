<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PasswordResetToken extends Model
{
    protected $primaryKey = 'token';
    protected $fillable = ['email', 'token', 'created_at'];
    public $timestamps = false;
    protected $casts = [
        'created_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email', 'mail');
    }
}
