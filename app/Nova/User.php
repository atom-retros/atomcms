<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Illuminate\Support\Carbon;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Atom\Core\Models\User>
     */
    public static $model = \Atom\Core\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'username';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'username', 'mail',
    ];

    /**
     * Get the fields displayed by the resource.
     *
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
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:users,username')
                ->updateRules('unique:users,username,{{resourceId}}'),

            Text::make('Real Name')
                ->onlyOnForms()
                ->rules('sometimes', 'nullable', 'max:255'),

            Text::make('Email', 'mail')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,mail')
                ->updateRules('unique:users,mail,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Text::make('Motto')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Select::make('Gender')
                ->hideFromIndex()
                ->options(['M' => 'Male', 'F' => 'Female'])
                ->rules('required', 'in:M,F')
                ->displayUsingLabels(),

            Text::make('Look')
                ->onlyOnForms()
                ->rules('required', 'max:255')
                ->default('hr-515-45.hd-180-1.ch-255-92.lg-285-91.sh-290-64.ea-1408-1408.fa-1201-1408'),

            Number::make('Credits')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(50000),

            BelongsTo::make('Rank', 'permission', Permission::class)
                ->sortable()
                ->default(1),

            BelongsTo::make('Team')
                ->hideFromIndex()
                ->nullable(),

            Boolean::make('Hidden Staff')
                ->sortable()
                ->rules('required', 'boolean'),

            Boolean::make('Online')
                ->sortable()
                ->exceptOnForms(),

            Text::make('Referral Code')
                ->hideFromIndex(),

            Number::make('Website Balance')
                ->hideFromIndex()
                ->rules('required', 'integer')
                ->default(0),

            Password::make('Pin Code', 'pincode')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'integer')
                ->default(null),

            Number::make('Date of Birth', 'account_day_of_birth')
                ->onlyOnDetail()
                ->displayUsing(fn ($value) => $value ? Carbon::createFromTimestamp($value)->format('Y-m-d H:i:s') : null),

            Number::make('Last Login')
                ->onlyOnDetail()
                ->displayUsing(fn ($value) => $value ? Carbon::createFromTimestamp($value)->format('Y-m-d H:i:s') : null),

            Number::make('Last Online')
                ->onlyOnDetail()
                ->displayUsing(fn ($value) => Carbon::createFromTimestamp($value)->format('Y-m-d H:i:s')),

            Number::make('Account Created')
                ->sortable()
                ->exceptOnForms()
                ->displayUsing(fn ($value) => Carbon::createFromTimestamp($value)->format('Y-m-d H:i:s')),

            Text::make('Registered IP', 'ip_register')
                ->onlyOnDetail(),

            Text::make('Current IP', 'ip_current')
                ->onlyOnDetail(),

            Text::make('Machine ID', 'machine_id')
                ->onlyOnDetail(),

            Text::make('Clones', 'clones', fn () => $this->clones->map(fn ($clone) => sprintf('<a href="%s" class="link-default">%s</a>', route('nova.pages.detail', ['resource' => 'users', 'resourceId' => $clone->id]), $clone->username))->join(', '))
                ->onlyOnDetail()
                ->asHtml(),
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
        return [
            new Lenses\ClonedUsers,
            new Lenses\OnlineUsers,
            new Lenses\Staff,
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            new Actions\SendHomeItem,
        ];
    }
}
