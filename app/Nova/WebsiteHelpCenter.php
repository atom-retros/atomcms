<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Jacobfitzp\NovaTinymce\Tinymce;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
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
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Help Centers';
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

            Number::make('Position')
                ->sortable()
                ->rules('required', 'integer'),

            Image::make('Image', 'image_url')
                ->hideFromIndex()
                ->disk(config('filesystems.default', 'public'))
                ->path('website-articles')
                ->creationRules('nullable')
                ->updateRules('nullable'),

            Tinymce::make('Content')
                ->fullWidth()
                ->resolveUsing(fn ($value) => str_replace('../../../..', config('app.url'), $value ?: ''))
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $model->{$attribute} = str_replace('../../../..', config('app.url'), $request->get($requestAttribute));
                }),

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
