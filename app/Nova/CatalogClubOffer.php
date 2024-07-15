<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogClubOffer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogClubOffer>
     */
    public static $model = \Atom\Core\Models\CatalogClubOffer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:35'),

            Select::make('Type')
                ->sortable()
                ->searchable()
                ->rules('required', 'in:HC,VIP')
                ->options(['HC' => 'HC', 'VIP' => 'VIP'])
                ->default('HC')
                ->displayUsingLabels(),

            Number::make('Days')
                ->sortable()
                ->rules('required', 'integer'),

            Number::make('Credits')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Number::make('Points')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Select::make('Points Type')
                ->sortable()
                ->searchable()
                ->rules('required', 'in:0,5,101')
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            Boolean::make('Deal')
                ->sortable()
                ->rules('required')
                ->default(false)
                ->trueValue('1')
                ->falseValue('0'),

            Boolean::make('Giftable')
                ->sortable()
                ->rules('required')
                ->default(false)
                ->trueValue('1')
                ->falseValue('0'),

            Boolean::make('Enabled')
                ->sortable()
                ->rules('required')
                ->default(true)
                ->trueValue('1')
                ->falseValue('0'),
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
