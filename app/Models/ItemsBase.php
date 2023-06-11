<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsBase extends Model
{
    protected $table = 'items_base';
    protected $guarded = ['id'];
    
    public function icon(): string {
        return $this->item_name . '_icon.png';
    }
}
