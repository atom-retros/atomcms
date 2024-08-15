<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Atom\Core\Models\WebsiteHomeItem;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Nova\Actions\ActionResponse;
use Outl1ne\MultiselectField\Multiselect;
use Laravel\Nova\Http\Requests\NovaRequest;

class SendHomeItem extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            foreach (json_decode($fields->items) as $itemId) {
                $model->homeItems()->attach($itemId);
            }
        }
        
        return ActionResponse::message('The item has been sent to the user\'s inventory!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $options = WebsiteHomeItem::with('category')
            ->get()
            ->map(fn ($item) => ['value' => $item->id, 'label' => $item->name ?: '-', 'group' => $item->category->name]);

        return [
            Multiselect::make('Items', 'items')
                ->placeholder('Search and select items to send')
                ->options($options)
                ->required(),
        ];
    }
}
