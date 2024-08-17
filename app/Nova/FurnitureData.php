<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class FurnitureData extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\FurnitureData>
     */
    public static $model = \Atom\Core\Models\FurnitureData::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'classname';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'classname',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make('Item ID', 'item_id')
                ->sortable()
                ->rules('required', 'integer', 'min:0'),

            Text::make('Classname')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:furniture_data,classname')
                ->updateRules('unique:furniture_data,classname,{{resourceId}}'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Description')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Select::make('Type')
                ->sortable()
                ->options(['roomitemtypes' => 'Room Item', 'wallitemtypes' => 'Wall Item'])
                ->rules('required', 'max:255', 'in:roomitemtypes,wallitemtypes')
                ->displayUsingLabels()
                ->default('roomitemtypes'),

            Number::make('Revision')
                ->sortable()
                ->rules('required', 'integer', 'min:0')
                ->default(0),

            Select::make('Category')
                ->hideFromIndex()
                ->options(['vending_machine' => 'Vending Machine', 'shelf' => 'Shelf', 'table' => 'Table', 'chair' => 'Chair', 'rug' => 'Rug', 'bed' => 'Bed', 'other' => 'Other', 'lighting' => 'Lighting', 'fortuna' => 'Fortuna', 'divider' => 'Divider', 'unknown' => 'Unknown', 'floor' => 'Floor', 'present' => 'Present', 'teleport' => 'Teleport', 'food' => 'Food', 'gate' => 'Gate', 'games' => 'Games', 'trophy' => 'Trophy', 'pets' => 'Pets', 'roller' => 'Roller', 'credit' => 'Credit', 'music' => 'Music', 'wired' => 'Wired', 'wall_decoration' => 'Wall Decoration', 'window' => 'Window', 'space' => 'Space'])
                ->rules('nullable', 'max:255', 'in:vending_machine,shelf,table,chair,rug,bed,other,lighting,fortuna,divider,unknown,floor,present,teleport,food,gate,games,trophy,pets,roller,credit,music,wired,wall_decoration,window,space')
                ->displayUsingLabels()
                ->default('other'),

            Text::make('Offer ID', 'offerid')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:-1')
                ->default(-1),

            Number::make('Default Direction', 'defaultdir')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'integer', 'min:0')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(0),

            Number::make('X Dimension', 'xdim')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'integer', 'min:0')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(1),

            Number::make('Y Dimension', 'ydim')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'integer', 'min:0')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(1),

            Text::make('Ad URL', 'adurl')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Number::make('Rent Offer ID', 'rentofferid')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:-1')
                ->default(-1),

            Text::make('Custom Params', 'customparams')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Number::make('Special Type', 'specialtype')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:0')
                ->default(0),

            Text::make('Furni Line', 'furniline')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Text::make('Environment')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),

            Boolean::make('Buyout')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Rent Buyout', 'rentbuyout')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Builders Club', 'bc')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Excluded Dynamic', 'excludeddynamic')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Boolean::make('Can Stand On', 'canstandon')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'boolean')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(false),

            Boolean::make('Can Sit On', 'cansiton')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'boolean')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(false),

            Boolean::make('Can Lay On', 'canlayon')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'boolean')
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
                ->default(false),

            Boolean::make('Rare')
                ->hideFromIndex()
                ->rules('required', 'boolean')
                ->default(false),

            Code::make('Part Colors', 'partcolors')
                ->hideFromIndex()
                ->dependsOn(['type'], fn ($field, $request, $formData) => $formData->type === 'wallitemtypes' ? $field->hide() : $field->show())
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
        return [
            Actions\SyncFurnitureData::make()->standalone(),
        ];
    }
}
