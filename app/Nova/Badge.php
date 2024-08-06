<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Badge extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Badge>
     */
    public static $model = \Atom\Core\Models\Badge::class;

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
        'file',
        'code',
        'name',
        'description',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Image::make('File')
                ->disk('album1584')
                ->storeAs(fn (Request $request) => sprintf('%s.gif', $request->get('code')))
                ->rules('sometimes', 'nullable')
                ->disableDownload(),

            Text::make('Code')
                ->sortable()
                ->rules('required', 'string', 'max:255')
                ->creationRules('unique:badges,code')
                ->updateRules('unique:badges,code,{{resourceId}}'),

            Text::make('Name')
                ->nullable()
                ->rules('sometimes', 'nullable', 'string', 'max:255'),

            Text::make('Description')
                ->nullable()
                ->rules('sometimes', 'nullable', 'string', 'max:255'),
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
