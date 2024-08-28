<?php

namespace App\Nova;

use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteShopVoucher extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteShopVoucher>
     */
    public static $model = \Atom\Core\Models\WebsiteShopVoucher::class;

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
        'code',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Vouchers';
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
                ->creationRules('unique:website_shop_vouchers,code')
                ->updateRules('unique:website_shop_vouchers,code,{{resourceId}}'),

            Number::make('Max Uses')
                ->sortable()
                ->rules('required', 'integer')
                ->default(1),
                
            Number::make('Use Count')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'integer')
                ->default(0),

            Number::make('Amount')
                ->sortable()
                ->rules('required', 'integer')
                ->default(0),
                
            Date::make('Expires At')
                ->sortable()
                ->rules('required')
                ->default(now()->addDays(7)),
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
