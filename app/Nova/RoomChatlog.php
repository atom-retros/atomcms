<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class RoomChatlog extends Resource
{
    use Traits\DisableCrud;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ChatlogRoom>
     */
    public static $model = \Atom\Core\Models\ChatlogRoom::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'message';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'sender.username',
        'receiver.username',
        'message',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('Room', 'room', Room::class)
                ->sortable()
                ->searchable(),

            BelongsTo::make('Sender', 'sender', User::class)
                ->sortable()
                ->searchable(),

            BelongsTo::make('Receiver', 'receiver', User::class)
                ->sortable()
                ->searchable(),

            Text::make('Message')
                ->sortable(),

            Number::make('Timestamp')
                ->sortable()
                ->displayUsing(fn ($timestamp) => date('Y-m-d H:i:s', $timestamp)),
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
