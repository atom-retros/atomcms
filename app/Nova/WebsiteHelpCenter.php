<?php

namespace App\Nova;

use Nevadskiy\Quill\Quill;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteHelpCenter extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteHelpCenterCategory>
     */
    public static $model = \Atom\Core\Models\WebsiteHelpCenterCategory::class;

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
        'content',
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

            Number::make('Position')
                ->sortable()
                ->rules('required', 'integer'),

            Image::make('Image', 'image_url')
                ->hideFromIndex()
                ->disk('public')
                ->path('website-articles')
                ->prunable()
                ->creationRules('nullable')
                ->updateRules('nullable'),

            Quill::make('Content')
                ->withFiles()
                ->theme('snow')
                ->toolbar([
                    [['header' => [1, 2, 3, 4, 5, 6, false]]],
                    ['bold', 'italic', 'underline'],
                    [['list' => 'ordered'], ['list' => 'bullet']],
                    ['blockquote', 'code-block', 'link', 'image'],
                    [['align' => []], 'clean'],
                    [['color' => []], ['background' => []]],
                ])
                ->alwaysShow(),

            Text::make('Button Text', 'button_text')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Text::make('Button URL', 'button_url')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Boolean::make('Small Box', 'small_box')
                ->sortable()
                ->rules('sometimes', 'nullable')
                ->default(false),
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
