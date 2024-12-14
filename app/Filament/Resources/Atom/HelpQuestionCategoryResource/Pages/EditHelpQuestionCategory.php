<?php

namespace App\Filament\Resources\Atom\HelpQuestionCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Atom\HelpQuestionCategoryResource;

class EditHelpQuestionCategory extends EditRecord
{
    protected static string $resource = HelpQuestionCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
