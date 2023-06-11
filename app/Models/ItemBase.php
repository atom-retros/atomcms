<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemBase extends Model
{
    protected $table = 'items_base';
    protected $guarded = ['id'];

    public function icon(): string {
        return sprintf('%s/%s_icon.png', setting('furniture_icons_path'), $this->item_name);
    }
}
