<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteHomeCategory extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteHomeCategory>
     */
    public static $model = \Atom\Core\Models\WebsiteHomeCategory::class;

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
        return 'Home Categories';
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

            BelongsTo::make('Parent', 'parent', self::class)
                ->sortable()
                ->nullable(),

            BelongsTo::make('Minimum Rank', 'permission', Permission::class)
                ->sortable()
                ->required()
                ->rules('required', 'exists:permissions,id'),

            HasMany::make('Children', 'children', self::class),

            HasMany::make('Items', 'items', WebsiteHomeItem::class),
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
