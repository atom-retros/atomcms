<?php

namespace App\Filament\Resources\Content\WebsiteArticleResource\Pages;

use App\Filament\Resources\Content\WebsiteArticleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteArticle extends EditRecord
{
    protected static string $resource = WebsiteArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}