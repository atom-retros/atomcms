<?php

namespace App\Nova;

use Jacobfitzp\NovaTinymce\Tinymce;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogTargetOffer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogTargetOffer>
     */
    public static $model = \Atom\Core\Models\CatalogTargetOffer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
        'offer_code',
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
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:128'),

            Number::make('Code', 'offer_code')
                ->sortable()
                ->rules('required', 'integer')
                ->creationRules('unique:catalog_target_offers,offer_code')
                ->updateRules('unique:catalog_target_offers,offer_code,{{resourceId}}'),

            Number::make('Purchase Limit', 'purchase_limit')
                ->sortable()
                ->rules('required', 'integer')
                ->default(0),

            Tinymce::make('Description')
                ->fullWidth()
                ->resolveUsing(fn ($value) => str_replace('../../../..', config('app.url'), $value ?: ''))
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $model->{$attribute} = str_replace('../../../..', config('app.url'), $request->get($requestAttribute));
                }),

            Text::make('Image')
                ->hideFromIndex()
                ->rules('required', 'max:128'),

            Text::make('Icon')
                ->hideFromIndex()
                ->rules('required', 'max:128'),

            Number::make('End Timestamp', 'end_timestamp')
                ->hideFromIndex()
                ->rules('required', 'integer'),

            Number::make('Credits')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Number::make('Points')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Select::make('Points Type')
                ->hideFromIndex()
                ->searchable()
                ->rules('required', 'in:0,5,101')
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            BelongsTo::make('Catalog Item', 'catalogItem', CatalogItem::class)
                ->sortable()
                ->searchable(),

            Text::make('Vars')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:1024'),
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
