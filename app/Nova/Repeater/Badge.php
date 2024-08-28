<?php

namespace App\Nova\Repeater;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Repeater\Repeatable;
use Laravel\Nova\Http\Requests\NovaRequest;

class Badge extends Repeatable
{
    /**
     * Get the fields displayed by the repeatable.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Badge', 'code')
                ->rules('required', 'max:255'),
        ];
    }
}
