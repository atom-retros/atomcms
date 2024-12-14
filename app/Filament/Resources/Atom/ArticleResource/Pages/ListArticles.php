<?php

namespace App\Filament\Resources\Atom\ArticleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Atom\ArticleResource;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
