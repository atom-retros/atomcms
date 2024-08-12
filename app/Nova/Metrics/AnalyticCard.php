<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Nova;

class AnalyticCard extends Value
{
    /**
     * Create a new metric instance.
     */
    public function __construct(public readonly string $model, ?string $title = null, ?string $icon = null)
    {
        $parts = explode('\\', $model);

        $this->icon = $icon ?: 'chart-bar';
        $this->name = $title ?: Nova::humanize(str()->plural(end($parts)));
    }

    /**
     * Calculate the value of the metric.
     *
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->result(app($this->model)->count())
            ->format(['thousandSeparated' => true]);
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }
}
