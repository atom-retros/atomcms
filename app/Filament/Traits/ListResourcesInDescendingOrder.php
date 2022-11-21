<?php

namespace App\Filament\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ListResourcesInDescendingOrder
{
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest('id');
    }
}