<?php

namespace App\Filament\Resources\Content\WebsiteArticleResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Content\WebsiteArticleResource;

class CreateWebsiteArticle extends CreateRecord
{
    protected static string $resource = WebsiteArticleResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = \Auth::id();

        return static::getModel()::create($data);
    }
}
