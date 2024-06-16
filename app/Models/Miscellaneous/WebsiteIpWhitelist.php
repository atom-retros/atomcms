<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class WebsiteIpWhitelist extends Model
{
    protected $table = 'website_ip_whitelist';

    protected $guarded = ['id'];
}
