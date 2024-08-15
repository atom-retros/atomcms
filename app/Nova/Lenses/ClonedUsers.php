<?php

namespace App\Nova\Lenses;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Fields\Avatar;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Http\Requests\NovaRequest;

class ClonedUsers extends Lens
{
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->whereExists(fn (Builder $subQuery) => $subQuery->select(DB::raw(1))
                ->from('users as u2')
                ->where(fn (Builder $conditonQuery) => $conditonQuery
                    ->whereColumn('u2.ip_register', 'users.ip_register')
                    ->orWhereColumn('u2.ip_register', 'users.ip_current')
                    ->orWhereColumn('u2.ip_current', 'users.ip_register')
                    ->orWhereColumn('u2.ip_current', 'users.ip_current'))
                ->whereColumn('users.id', '<>', 'u2.id')
                ->whereColumn('users.id', '>', DB::raw("(SELECT MIN(u3.id) FROM users u3 WHERE u3.ip_register = users.ip_register OR u3.ip_register = users.ip_current OR u3.ip_current = users.ip_register OR u3.ip_current = users.ip_current)"))
            )
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Avatar::make(str_repeat(' ', 8), 'look')
                ->exceptOnForms()
                ->thumbnail(fn () => sprintf('%s?figure=%s&head_direction=3&gesture=sml&headonly=1', config('nitro.imager_url'), $this->look))
                ->preview(fn () => sprintf('%s?figure=%s&head_direction=3&gesture=sml&headonly=0', config('nitro.imager_url'), $this->look)),

            Text::make('Username')
                ->sortable(),

            Text::make('Parent Account', fn () => DB::table('users as u2')
                ->where(fn (Builder $query) => $query->where('u2.ip_register', $this->ip_register)
                ->orWhere('u2.ip_register', $this->ip_current)
                ->orWhere('u2.ip_current', $this->ip_register)
                ->orWhere('u2.ip_current', $this->ip_current))
                ->orderBy('u2.id', 'asc')
                ->value('u2.username')
            ),
        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'cloned-users';
    }
}
