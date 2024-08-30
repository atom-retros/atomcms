<?php

namespace App\Nova;

use Jacobfitzp\NovaTinymce\Tinymce;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WebsiteArticle extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WebsiteArticle>
     */
    public static $model = \Atom\Core\Models\WebsiteArticle::class;

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
        'short_story',
        'full_story',
        'user.username',
    ];

    /**
     * The label associated with the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Articles';
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
                ->rules('required', 'max:255')
                ->creationRules('unique:website_articles,title')
                ->updateRules('unique:website_articles,title,{{resourceId}}'),

            Image::make('Image')
                ->hideFromIndex()
                ->disk(config('filesystems.default', 'public'))
                ->path('website-articles')
                ->prunable()
                ->creationRules('required')
                ->updateRules('nullable'),

            Text::make('Short Story')
                ->sortable()
                ->rules('required', 'max:255'),

            Tinymce::make('Full Story')
                ->fullWidth()
                ->resolveUsing(fn ($value) => str_replace('../../../..', config('app.url'), $value ?: ''))
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $model->{$attribute} = str_replace('../../../..', config('app.url'), $request->get($requestAttribute));
                }),

            BelongsTo::make('User', 'user', User::class)
                ->sortable()
                ->searchable()
                ->default($request->user()->id),

            Boolean::make('Is Published')
                ->sortable()
                ->trueValue(1)
                ->falseValue(0)
                ->dependsOn([], fn ($field) => auth()->user()->rank >= 6 ? $field->show() : $field->hide())
                ->default(0),

            Boolean::make('Can Comment')
                ->sortable()
                ->trueValue(1)
                ->falseValue(0)
                ->default(1),
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
            new Lenses\PublishedArticles,
            new Lenses\PendingArticles,
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
            new Actions\PublishArticles,
        ];
    }
}
