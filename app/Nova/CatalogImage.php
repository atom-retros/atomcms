<?php

namespace App\Nova;

use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogImage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogImage>
     */
    public static $model = \Atom\Core\Models\CatalogImage::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'file';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'file',
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
                ->disk('catalog_images')
                ->storeAs(fn (NovaRequest $request) => $request->file->getClientOriginalName())
                ->creationRules('required', 'image', 'unique:catalog_images,file')
                ->updateRules('nullable', 'image', 'unique:catalog_images,file')
                ->disableDownload(),
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
