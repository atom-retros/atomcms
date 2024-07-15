<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Ban extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Ban>
     */
    public static $model = \Atom\Core\Models\Ban::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'user.username';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'ip',
        'machine_id',
        'ban_expire',
        'ban_reason',
        'type',
        'cfh_topic',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('User', 'user', User::class)
                ->sortable()
                ->rules('required'),

            Text::make('IP Address', 'ip')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:50'),

            Text::make('Machine ID', 'machine_id')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Staff', 'staff', User::class)
                ->sortable()
                ->rules('required'),

            Text::make('Timestamp')
                ->hideFromIndex()
                ->sortable()
                ->rules('required')
                ->displayUsing(fn ($value) => date('Y-m-d H:i:s', $value)),

            Text::make('Ban Expire', 'ban_expire')
                ->hideFromIndex()
                ->sortable()
                ->rules('required')
                ->displayUsing(fn ($value) => date('Y-m-d H:i:s', $value)),

            Text::make('Ban Reason', 'ban_reason')
                ->sortable()
                ->rules('required', 'max:200'),

            Select::make('Type')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'in:account,ip,machine,super')
                ->options(['account' => 'Account', 'ip' => 'IP', 'machine' => 'Machine', 'super' => 'Super'])
                ->default('account')
                ->displayUsingLabels(),

            Text::make('CFH Topic', 'cfh_topic')
                ->sortable()
                ->rules('required', 'max:255'),		
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
