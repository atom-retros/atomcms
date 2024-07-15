<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class BuildersClubCatalogItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogItemBuildersClub>
     */
    public static $model = \Atom\Core\Models\CatalogItemBuildersClub::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'catalog_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'catalog_name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Catalog Name')
                ->sortable()
                ->rules('required', 'max:128'),

            BelongsTo::make('Page', 'page', BuildersClubCatalogPage::class)
                ->sortable()
                ->searchable()
                ->rules('required', 'exists:catalog_pages_bc,id'),

            Text::make('Item IDs', 'item_ids')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Number::make('Order Number')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(1),

            Text::make('Extra Data', 'extradata')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:500'),
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
