<?php

namespace App\Filament\Resources\Content\WebsiteArticleResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Content\WebsiteArticleResource;
use App\Filament\Traits\ListResourcesInDescendingOrder;

class ListWebsiteArticles extends ListRecords
{
    use ListResourcesInDescendingOrder;

    protected static string $resource = WebsiteArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
