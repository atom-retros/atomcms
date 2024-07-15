<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class BuildersClubCatalogPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogPage>
     */
    public static $model = \Atom\Core\Models\CatalogPageBuildersClub::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'caption';

    /**
     * The default ordering of resources.
     *
     * @var array
     */
    public static $ord = [
        'order_num' => 'asc',
    ];

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
            Number::make('Position', 'order_num')
                ->sortable()
                ->rules('required', 'integer'),

            BelongsTo::make('Parent', 'parent', self::class)
                ->hideFromIndex()
                ->searchable()
                ->nullable()
                ->rules('sometimes', 'nullable'),

            Text::make('Caption')
                ->sortable()
                ->rules('required', 'max:128'),

            Select::make('Page Layout')
                ->sortable()
                ->searchable()
                ->options(['default_3x3' => 'default_3x3', 'club_buy' => 'club_buy', 'club_gift' => 'club_gift', 'frontpage' => 'frontpage', 'spaces' => 'spaces', 'recycler' => 'recycler', 'recycler_info' => 'recycler_info', 'recycler_prizes' => 'recycler_prizes', 'trophies' => 'trophies', 'plasto' => 'plasto', 'marketplace' => 'marketplace', 'marketplace_own_items' => 'marketplace_own_items', 'spaces_new' => 'spaces_new', 'soundmachine' => 'soundmachine', 'guilds' => 'guilds', 'guild_furni' => 'guild_furni', 'info_duckets' => 'info_duckets', 'info_rentables' => 'info_rentables', 'info_pets' => 'info_pets', 'roomads' => 'roomads', 'single_bundle' => 'single_bundle', 'sold_ltd_items' => 'sold_ltd_items', 'badge_display' => 'badge_display', 'bots' => 'bots', 'pets' => 'pets', 'pets2' => 'pets2', 'pets3' => 'pets3', 'productpage1' => 'productpage1', 'room_bundle' => 'room_bundle', 'recent_purchases' => 'recent_purchases', 'default_3x3_color_grouping' => 'default_3x3_color_grouping', 'guild_forum' => 'guild_forum', 'vip_buy' => 'vip_buy', 'info_loyalty' => 'info_loyalty', 'loyalty_vip_buy' => 'loyalty_vip_buy', 'collectibles' => 'collectibles', 'petcustomization' => 'petcustomization', 'frontpage_featured' => 'frontpage_featured'])
                ->rules('required', 'in:default_3x3,club_buy,club_gift,frontpage,spaces,recycler,recycler_info,recycler_prizes,trophies,plasto,marketplace,marketplace_own_items,spaces_new,soundmachine,guilds,guild_furni,info_duckets,info_rentables,info_pets,roomads,single_bundle,sold_ltd_items,badge_display,bots,pets,pets2,pets3,productpage1,room_bundle,recent_purchases,default_3x3_color_grouping,guild_forum,vip_buy,info_loyalty,loyalty_vip_buy,collectibles,petcustomization,frontpage_featured')
                ->default('default_3x3')
                ->displayUsingLabels(),

            Number::make('Icon Color')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(1),

            Number::make('Icon Image')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Text::make('Page Headline')
                ->hideFromIndex()
                ->rules('sometimes', 'max:1024'),

            Text::make('Page Teaser')
                ->hideFromIndex()
                ->rules('sometimes', 'max:64'),

            Text::make('Page Special')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text 1', 'page_text1')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text 2', 'page_text2')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text Details', 'page_text_details')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text Teaser', 'page_text_teaser')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Boolean::make('Visible')
                ->sortable()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(true),

            Boolean::make('Enabled')
                ->sortable()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(true),

            HasMany::make('Items', 'items', BuildersClubCatalogItem::class),

            HasMany::make('Children', 'children', self::class),
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

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return ($request->viaRelationship || $request->viaResource || $request->viaResourceId || $request->editing || $request->creating)
            ? $query
            : $query->where('parent_id', -1);
    }
}
