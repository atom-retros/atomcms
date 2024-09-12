<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Atom\Core\Models\FurnitureData;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class SyncFurnitureData extends Action
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
        $wallItems = FurnitureData::whereType('wallitemtypes')
            ->get()
            ->map(fn (FurnitureData $item) => ['id' => $item->item_id, 'db_id' => $item->id, ...$item->only('classname', 'revision', 'category', 'name', 'description', 'adurl', 'offerid', 'buyout', 'rentofferid', 'rentbuyout', 'bc', 'excludeddynamic', 'customparams', 'specialtype', 'furniline', 'environment', 'rare')])
            ->toArray();

        $roomItems = FurnitureData::whereType('roomitemtypes')
            ->get()
            ->map(fn (FurnitureData $item) => ['id' => $item->item_id, 'db_id' => $item->id, ...$item->only('classname', 'revision', 'category', 'defaultdir', 'xdim', 'ydim', 'partcolors', 'name', 'description', 'adurl', 'offerid', 'buyout', 'rentofferid', 'rentbuyout', 'bc', 'excludeddynamic', 'customparams', 'specialtype', 'canstandon', 'cansiton', 'canlayon', 'furniline', 'environment', 'rare')])
            ->toArray();

        Storage::disk('static')
            ->put(config('nitro.furniture_data_file'), json_encode([
                'roomitemtypes' => ['furnitype' => $roomItems],
                'wallitemtypes' => ['furnitype' => $wallItems],
            ]));
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }
}
