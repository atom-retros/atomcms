<?php

namespace App\Filament\Resources\Catalog\CatalogPageResource\Pages;

use App\Filament\Resources\Catalog\CatalogPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatalogPage extends EditRecord
{
    protected static string $resource = CatalogPageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
