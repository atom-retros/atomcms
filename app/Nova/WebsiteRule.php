<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteRule extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteRule>
     */
    public static $model = \Atom\Core\Models\WebsiteRule::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'rule';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'paragraph',
        'rule',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('Category', 'category', WebsiteRuleCategory::class)
                ->searchable()
                ->searchable()
                ->sortable(),

            Text::make('Paragraph')
                ->sortable()
                ->rules('required', 'max:8')
                ->creationRules('unique:website_rules,paragraph')
                ->updateRules('unique:website_rules,paragraph,{{resourceId}}'),

            Text::make('Rule')
                ->sortable()
                ->rules('required'),
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
