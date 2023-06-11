<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteShopArticles extends Model
{
    protected $guarded = ['id'];

    public function furniItems(): Array {
        if (empty($this->furnis) === true) {
            return [];
        }

        $furnis = explode(';', $this->furnis);

        $furni_items = [];
        
        foreach ($furnis as $furni) {
            $furni_result = ItemsBase::where('id', (int)$furni)->select(['id', 'public_name', 'item_name'])->first();
            if ($furni_result === null) {
                continue;
            }
            
            array_push($furni_items, $furni_result);
        }

        return $furni_items;
    }
}