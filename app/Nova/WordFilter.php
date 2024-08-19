<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WordFilter extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WordFilter>
     */
    public static $model = \Atom\Core\Models\WordFilter::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'key',
        'replacement',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Key')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:wordfilter,key')
                ->updateRules('unique:wordfilter,key,{{resourceId}}'),

            Text::make('Replacement')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('Hide')
                ->sortable()
                ->rules('required')
                ->trueValue('1')
                ->falseValue('0'),

            Boolean::make('Report')
                ->sortable()
                ->rules('required')
                ->trueValue('1')
                ->falseValue('0'),

            Boolean::make('Mute')
                ->sortable()
                ->rules('required')
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
