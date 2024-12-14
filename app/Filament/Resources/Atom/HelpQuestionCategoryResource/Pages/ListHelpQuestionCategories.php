<?php

namespace App\Filament\Resources\Atom\HelpQuestionCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Atom\HelpQuestionCategoryResource;

class ListHelpQuestionCategories extends ListRecords
{
    protected static string $resource = HelpQuestionCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'order';
    }
}
