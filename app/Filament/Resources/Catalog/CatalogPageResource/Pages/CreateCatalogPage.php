<?php

namespace App\Filament\Resources\Catalog\CatalogPageResource\Pages;

use App\Filament\Resources\Catalog\CatalogPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCatalogPage extends CreateRecord
{
    protected static string $resource = CatalogPageResource::class;
}
