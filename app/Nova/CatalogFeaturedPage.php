<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogFeaturedPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogFeaturedPage>
     */
    public static $model = \Atom\Core\Models\CatalogFeaturedPage::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'caption';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'caption',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make('Slot', 'slot_id')
                ->sortable()
                ->rules('required', 'integer')
                ->creationRules('unique:catalog_featured_pages,slot_id')
                ->updateRules('unique:catalog_featured_pages,slot_id,{{resourceId}}')
                ->default(1),

            Text::make('Image')
                ->hideFromIndex()
                ->rules('required', 'max:70'),

            Text::make('Caption')
                ->sortable()
                ->rules('required', 'max:130'),

            Select::make('Type')
                ->sortable()
                ->rules('required')
                ->options(['page_name' => 'Page Name', 'page_id' => 'Page ID', 'product_name' => 'Product Name'])
                ->default('page_name')
                ->displayUsingLabels(),

            Number::make('Expire Timestamp', 'expire_timestamp')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(-1),

            Text::make('Page Name')
                ->hideFromIndex()
                ->rules('required', 'max:30'),

            BelongsTo::make('Page', 'page', CatalogPage::class),

            Text::make('Product Name')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:40'),
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
