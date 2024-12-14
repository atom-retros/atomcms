<?php

namespace App\Filament\Resources\Atom\TagResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Atom\TagResource;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
