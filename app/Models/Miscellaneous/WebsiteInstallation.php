<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class WebsiteInstallation extends Model
{
    protected $table = 'website_installation';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
