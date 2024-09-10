<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogItem>
     */
    public static $model = \Atom\Core\Models\CatalogItem::class;

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

            BelongsTo::make('Page', 'page', CatalogPage::class)
                ->sortable()
                ->searchable()
                ->displayUsing(fn ($page) => sprintf('%s (%s)', $page->caption, $page->caption_save))
                ->rules('required', 'exists:catalog_pages,id'),

            Text::make('Item IDs', 'item_ids')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Number::make('Amount')
                ->rules('required', 'integer')
                ->default(1),

            Number::make('Cost Credits')
                ->sortable()
                ->rules('required', 'integer')
                ->default(0),

            Select::make('Points Type')
                ->searchable()
                ->rules('required', 'in:0,5,101')
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            Number::make('Cost Points')
                ->rules('required', 'integer')
                ->default(0),

            (new Panel('Advanced Settings', [
                Number::make('Limited Stack')
                    ->hideFromIndex()
                    ->rules('required', 'integer')
                    ->default(0),

                Number::make('Limited Sells')
                    ->hideFromIndex()
                    ->rules('required', 'integer')
                    ->default(0),

                Number::make('Order Number')
                    ->hideFromIndex()
                    ->rules('required', 'integer')
                    ->default(1),

                Number::make('Offer ID')
                    ->hideFromIndex()
                    ->rules('required', 'integer')
                    ->default(-1),

                Number::make('Song ID', 'song_id')
                    ->hideFromIndex()
                    ->rules('required', 'integer')
                    ->default(0),

                Text::make('Extra Data', 'extradata')
                    ->hideFromIndex()
                    ->rules('sometimes', 'nullable', 'max:500'),

                Boolean::make('Have Offer')
                    ->hideFromIndex()
                    ->trueValue('1')
                    ->falseValue('0')
                    ->default('1'),

                Boolean::make('Club Only')
                    ->hideFromIndex()
                    ->trueValue('1')
                    ->falseValue('0')
                    ->default('0'),
            ]))->collapsedByDefault(),
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
