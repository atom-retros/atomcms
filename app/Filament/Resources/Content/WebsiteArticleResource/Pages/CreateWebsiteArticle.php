<?php

namespace App\Filament\Resources\Content\WebsiteArticleResource\Pages;

use App\Filament\Resources\Content\WebsiteArticleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsiteArticle extends CreateRecord
{
    protected static string $resource = WebsiteArticleResource::class;
}