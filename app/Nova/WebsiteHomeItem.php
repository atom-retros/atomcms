<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteHomeItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteHomeItem>
     */
    public static $model = \Atom\Core\Models\WebsiteHomeItem::class;

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
        'description',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Description')
                ->sortable()
                ->nullable()
                ->rules('sometimes', 'nullable', 'max:255'),

            Select::make('Type')
                ->sortable()
                ->options(['sticker' => 'Sticker', 'background' => 'Background', 'widget' => 'Widget', 'note' => 'Note'])
                ->rules('required')
                ->displayUsingLabels(),

            BelongsTo::make('Category', 'category', WebsiteHomeCategory::class)
                ->sortable()
                ->rules('required'),

            Image::make('Image', 'image_url')
                ->disk('public')
                ->path(Str::plural($this->type))
                ->rules('required'),

            Number::make('Count')
                ->hideFromIndex()
                ->required()
                ->default(1),

            Number::make('Price')
                ->hideFromIndex()
                ->required()
                ->default(1),

            Select::make('Extra Currency Type', 'currency_type')
                ->hideFromIndex()
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            Number::make('Extra Currency Price', 'currency_price')
                ->hideFromIndex()
                ->required()
                ->default(0),

            Hidden::make('Data')
                ->hideFromIndex()
                ->default((object) []),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
