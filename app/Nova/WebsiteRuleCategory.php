<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteRuleCategory extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteRuleCategory>
     */
    public static $model = \Atom\Core\Models\WebsiteRuleCategory::class;

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
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Rules';
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

            Text::make('Description')
                ->sortable()
                ->rules('required', 'max:255'),

            Hidden::make('Badge')
                ->default('hotel'),

            HasMany::make('Rules', 'rules', WebsiteRule::class),
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
