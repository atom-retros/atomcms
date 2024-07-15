<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Team extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteTeam>
     */
    public static $model = \Atom\Core\Models\WebsiteTeam::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'rank_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'rank_name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name', 'rank_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:website_teams,rank_name')
                ->updateRules('unique:website_teams,rank_name,{{resourceId}}'),

            Boolean::make('Hidden Rank')
                ->sortable()
                ->rules('required', 'boolean'),

            Text::make('Badge')
                ->sortable()
                ->rules('sometimes', 'nullable', 'max:255'),

            HasMany::make('Users'),
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
