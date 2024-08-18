<?php

namespace App\Nova;

use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CameraWeb extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CameraWeb>
     */
    public static $model = \Atom\Core\Models\CameraWeb::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user.username',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Camera Photos';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('User', 'user', User::class),

            Text::make('Room', 'room_id')
                ->hideFromIndex()
                ->rules('required', 'max:255', 'exists:rooms,id'),

            Avatar::make('Image', 'url')
                ->exceptOnForms()
                ->thumbnail(fn () => $this->url)
                ->preview(fn () => $this->url),

            Boolean::make('Approved', 'approved')
                ->sortable()
                ->rules('required'),
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
            new Actions\ApproveCameraWeb,
            new Actions\RejectCameraWeb,
        ];
    }
}
