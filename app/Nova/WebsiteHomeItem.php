<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteHomeItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteHomeItem>
     */
    public static $model = \Atom\Core\Models\WebsiteHomeItem::class;

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
        'name',
        'description',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Home Items';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Description')
                ->sortable()
                ->nullable()
                ->rules('sometimes', 'nullable', 'max:255'),

            Number::make('Maximum Purchases')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(fn () => -1),

            Select::make('Type')
                ->sortable()
                ->options(['sticker' => 'Sticker', 'background' => 'Background', 'widget' => 'Widget', 'note' => 'Note'])
                ->rules('required')
                ->default('sticker')
                ->displayUsingLabels(),

            BelongsTo::make('Category', 'category', WebsiteHomeCategory::class)
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Minimum Rank', 'permission', Permission::class)
                ->sortable()
                ->required()
                ->default(1)
                ->rules('required', 'exists:permissions,id'),

            Image::make('Image', 'image_url')
                ->disk(config('filesystems.default', 'public'))
                ->path(Str::plural($this->type))
                ->creationRules('required')
                ->updateRules('nullable'),

            Number::make('Count')
                ->hideFromIndex()
                ->required()
                ->default(1),

            Number::make('Price')
                ->hideFromIndex()
                ->required()
                ->default(1),

            Select::make('Extra Currency Type', 'currency_type')
                ->hideFromIndex()
                ->options(['0' => 'Duckets', '5' => 'Diamonds', '101' => 'GOTW Points'])
                ->default('0')
                ->displayUsingLabels(),

            Number::make('Extra Currency Price', 'currency_price')
                ->hideFromIndex()
                ->required()
                ->default(0),

            Code::make('Data')
                ->hideFromIndex()
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) { $model->{$attribute} = json_encode((object) []); })
                ->json(),
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
