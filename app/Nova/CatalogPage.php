<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Http\Requests\NovaRequest;

class CatalogPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CatalogPage>
     */
    public static $model = \Atom\Core\Models\CatalogPage::class;

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
                ->rules('required', 'integer')
                ->default(1),

            Select::make('Parent', 'parent_id')
                ->sortable()
                ->searchable()
                ->options(CatalogPage::all()->map(fn ($page) => ['id' => $page->id, 'caption' => sprintf('%s (%s)', $page->caption, $page->caption_save)])->push(['id' => -1, 'caption' => 'No Parent'])->pluck('caption', 'id'))
                ->rules('required')
                ->default(-1)
                ->displayUsingLabels(),

            Text::make('Caption')
                ->sortable()
                ->rules('required', 'max:128'),

            Hidden::make('Caption Save')
                ->onlyOnForms()
                ->hideWhenUpdating()
                ->fillUsing(fn ($request, $model, $attribute, $requestAttribute) => 
                    $model->{$attribute} = $request->isCreateOrAttachRequest() 
                        ? Str::snake($request->input('caption')) 
                        : $request->input($requestAttribute)
                ),

            Text::make('Caption Save')
                ->hideFromIndex()
                ->hideWhenCreating()
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
                ->hideWhenCreating()
                ->rules('required', 'integer')
                ->default(1),

            Number::make('Icon Image')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('required', 'integer')
                ->default(0),

            BelongsTo::make('Minimum Rank', 'permission', Permission::class)
                ->sortable()
                ->rules('required', 'exists:permissions,id'),

            Text::make('Page Headline')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'max:1024'),

            Text::make('Page Teaser')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'max:64'),

            Text::make('Page Special')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text 1', 'page_text1')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text 2', 'page_text2')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text Details', 'page_text_details')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'nullable', 'max:2048'),

            Text::make('Page Text Teaser', 'page_text_teaser')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('sometimes', 'nullable', 'max:2048'),

            BelongsTo::make('Room', 'room', Room::class)
                ->hideFromIndex()
                ->hideWhenCreating()
                ->searchable()
                ->nullable(),

            MultiSelect::make('Includes')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->options(CatalogPage::all()->pluck('caption', 'id'))
                ->displayUsingLabels(),

            Boolean::make('Visible')
                ->sortable()
                ->hideWhenCreating()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(true),

            Boolean::make('Enabled')
                ->sortable()
                ->hideWhenCreating()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(true),

            Boolean::make('Club Only')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(false),

            Boolean::make('VIP Only')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0)
                ->default(false),

            HasMany::make('Children', 'children', self::class),

            HasMany::make('Items', 'items', CatalogItem::class),
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
