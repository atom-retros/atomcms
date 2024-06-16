<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class WebsiteIpBlacklist extends Model
{
    protected $table = 'website_ip_blacklist';

    protected $guarded = ['id'];
}
