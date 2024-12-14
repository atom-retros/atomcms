<?php

namespace App\Filament\Resources\Atom\HelpQuestionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Atom\HelpQuestionResource;

class EditHelpQuestion extends EditRecord
{
    protected static string $resource = HelpQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
