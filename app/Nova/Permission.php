<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Http\Requests\NovaRequest;

class Permission extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Atom\Core\Models\Permission>
     */
    public static $model = \Atom\Core\Models\Permission::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'rank_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'rank_name',
    ];

    /**
     * The columns that should be excluded from the permissions fields.
     *
     * @var array
     */
    protected array $excludedColumns = [
        'id',
        'rank_name',
        'hidden_rank',
        'badge',
        'job_description',
        'staff_color',
        'staff_background',
        'level',
        'room_effect',
        'log_commands',
        'prefix',
        'prefix_color',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make('Level')
                ->sortable()
                ->rules('required', 'integer', 'min:1', 'max:255')
                ->creationRules('unique:permissions,level')
                ->updateRules('unique:permissions,level,{{resourceId}}'),

            Text::make('Name', 'rank_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:permissions,rank_name')
                ->updateRules('unique:permissions,rank_name,{{resourceId}}'),

            Boolean::make('Hidden Rank')
                ->sortable()
                ->rules('required', 'boolean'),

            Boolean::make('Log Commands')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0),

            Text::make('Badge')
                ->sortable()
                ->rules('sometimes', 'nullable', 'max:255'),

            Text::make('Prefix')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:5'),

            Text::make('Prefix Color')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:7'),

            Number::make('Auto Credits Amount')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:0'),

            Number::make('Auto Pixels Amount')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:0'),

            Number::make('Auto GOTW Amount')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:0'),

            Number::make('Auto Points Amount')
                ->hideFromIndex()
                ->rules('required', 'integer', 'min:0'),

            ...$this->getPermissionsFields($request),

            HasMany::make('Users'),
        ];
    }

    /**
     * Get the permissions fields for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function getPermissionsFields(NovaRequest $request): array
    {
        return collect(Schema::getColumnListing((new self::$model)->getTable()))
            ->filter(fn (string $column) => !in_array($column, $this->excludedColumns))
            ->map(fn (string $column) => $this->getPermissionField($request, $column))
            ->toArray();
    }

    /**
     * Get the permission field for the resource.
     *
     * @param NovaRequest $request
     * @param string $column
     * @return Field
     */
    public function getPermissionField(NovaRequest $request, string $column): Select
    {
        return Select::make($column)
            ->hideFromIndex()
            ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
            ->rules('required', 'in:0,1,2')
            ->default(0)
            ->displayUsingLabels();
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
