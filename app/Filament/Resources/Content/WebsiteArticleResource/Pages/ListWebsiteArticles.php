<?php

namespace App\Filament\Resources\Content\WebsiteArticleResource\Pages;

use App\Filament\Resources\Content\WebsiteArticleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteArticles extends ListRecords
{
    protected static string $resource = WebsiteArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}