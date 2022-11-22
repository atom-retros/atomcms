<?php

namespace App\Filament\Resources\Catalog\CatalogPageResource\Pages;

use App\Filament\Resources\Catalog\CatalogPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatalogPages extends ListRecords
{
    protected static string $resource = CatalogPageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
