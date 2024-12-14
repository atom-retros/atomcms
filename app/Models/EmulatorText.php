<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmulatorText extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $primaryKey = 'key';

    public $incrementing = false;
}
