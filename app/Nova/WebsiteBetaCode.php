<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteBetaCode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteBetaCode>
     */
    public static $model = \Atom\Core\Models\WebsiteBetaCode::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'code';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'code',
        'user.username',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Beta Codes';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Code')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:website_beta_codes,code')
                ->updateRules('unique:website_beta_codes,code,{{resourceId}}')
                ->default(str()->uuid()),

            BelongsTo::make('User', 'user', User::class)
                ->sortable()
                ->searchable()
                ->rules('sometimes', 'nullable', 'exists:users,id'),
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
