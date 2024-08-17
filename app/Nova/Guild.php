<?php

namespace App\Nova;

use Carbon\Carbon;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use App\Nova\Traits\DisableCrud;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Guild extends Resource
{
    use DisableCrud;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Guild>
     */
    public static $model = \Atom\Core\Models\Guild::class;

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
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable(),

            Textarea::make('Description')
                ->onlyOnDetail(),

            BelongsTo::make('User', 'owner', User::class)
                ->sortable(),

            BelongsTo::make('Room', 'room', Room::class)
                ->sortable(),

            Number::make('State')
                ->onlyOnDetail(),

            Boolean::make('Rights')
                ->onlyOnDetail(),

            Boolean::make('Forum'),

            Text::make('Color One')
                ->onlyOnDetail(),

            Text::make('Color Two')
                ->onlyOnDetail(),

            Text::make('Badge')
                ->onlyOnDetail(),

            

            Select::make('Read Forum')
                ->hideFromIndex()
                ->options(['EVERYONE' => 'Everyone','MEMBERS' => 'Members','ADMINS' => 'Admins'])
                ->displayUsingLabels(),

            Select::make('Post Messages')
                ->hideFromIndex()
                ->options(['EVERYONE' => 'Everyone','MEMBERS' => 'Members','ADMINS' => 'Admins', 'OWNER' => 'Owner'])
                ->displayUsingLabels(),

            Select::make('Post Threads')
                ->hideFromIndex()
                ->options(['EVERYONE' => 'Everyone','MEMBERS' => 'Members','ADMINS' => 'Admins', 'OWNER' => 'Owner'])
                ->displayUsingLabels(),

            Select::make('Mod Forum')
                ->hideFromIndex()
                ->options(['EVERYONE' => 'Everyone','MEMBERS' => 'Members','ADMINS' => 'Admins', 'OWNER' => 'Owner'])
                ->displayUsingLabels(),


            Date::make('Date Created')
                ->displayUsing(fn ($value) => $value ? Carbon::createFromTimestamp($value)->format('Y-m-d H:i:s') : null),
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
