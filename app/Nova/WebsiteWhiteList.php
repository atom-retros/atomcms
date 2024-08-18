<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteWhiteList extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteIpWhitelist>
     */
    public static $model = \Atom\Core\Models\WebsiteIpWhitelist::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'ip_address';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'ip_address',
        'asn',
        'whitelist_asn',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'White Lists';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('IP Address', 'ip_address')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:website_ip_whitelist,ip_address')
                ->updateRules('unique:website_ip_whitelist,ip_address,{{resourceId}}'),

            Boolean::make('Whitelist ASN', 'whitelist_asn')
                ->sortable()
                ->rules('sometimes', 'nullable')
                ->default(false),

            Text::make('ASN', 'asn')
                ->sortable()
                ->rules('sometimes', 'nullable'),
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
