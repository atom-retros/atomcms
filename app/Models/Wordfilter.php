<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wordfilter extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'wordfilter';

    protected $primaryKey = 'key';

    public $timestamps = false;

    public $incrementing = false;
}
