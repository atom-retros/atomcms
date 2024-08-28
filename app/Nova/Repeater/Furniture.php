<?php

namespace App\Nova\Repeater;

use Atom\Core\Models\ItemBase;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Repeater\Repeatable;

class Furniture extends Repeatable
{
    /**
     * Get the fields displayed by the repeatable.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make('Amount', 'amount')
                ->rules('required', 'min:1', 'max:255')
                ->default(1),

            Select::make('Item', 'id')
                ->searchable()
                ->options(ItemBase::all()->pluck('public_name', 'id'))
                ->displayUsingLabels()
                ->rules('required'),
        ];
    }
}
