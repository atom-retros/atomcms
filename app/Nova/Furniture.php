<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Furniture extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ItemBase>
     */
    public static $model = \Atom\Core\Models\ItemBase::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'public_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'public_name',
        'item_name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Public Name')
                ->sortable()
                ->rules('required', 'max:56'),

            Text::make('Item Name')
                ->hideFromIndex()
                ->rules('required', 'max:70'),

            Select::make('Type')
                ->sortable()
                ->options(['s' => 'Floor', 'i' => 'Wall', 'b' => 'Badge', 'S' => 'Floor'])
                ->rules('required', 'in:s,i,b,S,I,B')
                ->displayUsingLabels(),

            Number::make('Sprite ID', 'sprite_id')
                ->sortable()
                ->rules('required', 'integer')
                ->default(0),

            Number::make('Width')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(1),

            Number::make('Length')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(1),

            Number::make('Stack Height')
                ->hideFromIndex()
                ->step(0.1)
                ->rules('required', 'numeric')
                ->default(0),

            Boolean::make('Allow Stack')
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Sit')
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Lay')
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Walk')
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Gift')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Trade')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Recycle')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Marketplace Sell')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Allow Inventory Stack')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Text::make('Interaction Type')
                ->hideFromIndex()
                ->rules('required', 'max:500')
                ->default('default'),

            Number::make('Interaction Modes Count')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Text::make('Vending IDs')
                ->hideFromIndex()
                ->rules('required', 'max:255')
                ->default('0'),

            Text::make('Multi Height', 'multiheight')
                ->hideFromIndex()
                ->rules('nullable', 'max:50')
                ->default(''),

            Text::make('Custom Params', 'customparams')
                ->hideFromIndex()
                ->rules('nullable', 'max:50')
                ->default(''),

            Number::make('Effect ID (male)', 'effect_id_male')
                ->hideFromIndex()
                ->rules('nullable', 'integer')
                ->default(0),

            Number::make('Effect ID (female)', 'effect_id_female')
                ->hideFromIndex()
                ->rules('nullable', 'integer')
                ->default(0),

            Text::make('Clothing on Walk')
                ->hideFromIndex()
                ->rules('nullable', 'max:255')
                ->default(''),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
