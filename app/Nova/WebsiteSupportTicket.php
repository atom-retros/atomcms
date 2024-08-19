<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteSupportTicket extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteHelpCenterTicket>
     */
    public static $model = \Atom\Core\Models\WebsiteHelpCenterTicket::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
        'content',
        'user.username',
        'category.name',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Support Tickets';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('User', 'user', User::class)
                ->searchable()
                ->sortable()
                ->rules('required', 'exists:users,id'),

            BelongsTo::make('Category', 'category', WebsiteRuleCategory::class)
                ->sortable()
                ->rules('required', 'exists:website_rule_categories,id'),

            Textarea::make('Content')
                ->sortable()
                ->rules('required'),

            Boolean::make('Open')
                ->sortable()
                ->rules('required')
                ->default(true),

            HasMany::make('Replies', 'replies', WebsiteSupportTicketReply::class),
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
