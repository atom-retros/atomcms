<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteSetting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteSetting>
     */
    public static $model = \Atom\Core\Models\WebsiteSetting::class;

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
        'value',
        'comment',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Settings';
    }

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
                ->creationRules('unique:website_settings,key')
                ->updateRules('unique:website_settings,key,{{resourceId}}'),

            Text::make('Value')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Comment')
                ->sortable()
                ->rules('required', 'max:255'),
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
