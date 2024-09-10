<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteRareValue extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteRareValue>
     */
    public static $model = \Atom\Core\Models\WebsiteRareValue::class;

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
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Rare Values';
    }

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
                ->rules('required', 'max:255'),

            BelongsTo::make('Category', 'category', WebsiteRareValueCategory::class)
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Furniture', 'item', Furniture::class)
                ->hideFromIndex()
                ->sortable()
                ->searchable()
                ->rules('required', 'exists:items_base,id'),

            Number::make('Credit Value')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Select::make('Currency Type', 'currency_type')
                ->hideFromIndex()
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            Number::make('Currency Price', 'currency_value')
                ->hideFromIndex()
                ->required()
                ->default(0),

            Image::make('Image', 'furniture_icon')
                ->hideFromIndex()
                ->disk(config('filesystems.default', 'public'))
                ->creationRules('required')
                ->updateRules('nullable'),
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
